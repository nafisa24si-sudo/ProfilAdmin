<?php
// Usage: php create_user.php email name [password]
$email = $argv[1] ?? null;
$name = $argv[2] ?? 'User';
$plain = $argv[3] ?? null;
if (!$email) {
    echo "Usage: php create_user.php email name [password]\n";
    exit(1);
}
if (!$plain) {
    // generate random secure password
    $plain = substr(bin2hex(random_bytes(6)),0,12) . 'A1!';
}
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=laravel;charset=utf8","root","", [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    // check exists
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        echo "ALREADY_EXISTS\n";
        exit(0);
    }
    // hash password using PHP bcrypt
    $hash = password_hash($plain, PASSWORD_BCRYPT, ['cost' => 12]);
    $stmt = $pdo->prepare('INSERT INTO users (name,email,password,created_at,updated_at) VALUES (?, ?, ?, NOW(), NOW())');
    $stmt->execute([$name, $email, $hash]);
    echo "CREATED\n";
    echo json_encode(['email'=>$email,'name'=>$name,'password'=>$plain], JSON_PRETTY_PRINT) . "\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    exit(1);
}
