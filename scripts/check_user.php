<?php

$email = $argv[1] ?? 'nagisa@dim.com';
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=laravel;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $pdo->prepare("SELECT id, name, email, password, role FROM users WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        echo "FOUND\n";
        echo json_encode($row, JSON_PRETTY_PRINT) . "\n";
    } else {
        echo "NOT_FOUND\n";
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    exit(1);
}
