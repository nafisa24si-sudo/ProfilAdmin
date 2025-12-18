<?php
// Usage: php try_login.php email password [baseUrl]
$email = $argv[1] ?? null;
$password = $argv[2] ?? null;
$base = $argv[3] ?? 'http://127.0.0.1:8000';
if (!$email || !$password) {
    echo "Usage: php try_login.php email password [baseUrl]\n";
    exit(1);
}

function curl_get($url, &$cookieJar) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // store headers to parse cookies
    $response = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);
    // extract set-cookie
    preg_match_all('/Set-Cookie: ([^=]+=[^;]+)/mi', $header, $m);
    $cookies = [];
    if (!empty($m[1])) {
        foreach ($m[1] as $c) {
            $cookies[] = $c;
        }
    }
    $cookieJar = implode('; ', $cookies);
    curl_close($ch);
    return $body;
}

function curl_post($url, $postFields, $cookieJar) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Cookie: $cookieJar"]); 
    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);
    curl_close($ch);
    return [$status, $header, $body];
}

// 1) GET login page
$loginPage = curl_get($base.'/', $cookieJar);
// 2) extract csrf token from input hidden _token
if (preg_match('/name="_token" value="([^"]+)"/i', $loginPage, $m)) {
    $token = $m[1];
} else if (preg_match('/<meta name="csrf-token" content="([^"]+)"/', $loginPage, $m)) {
    $token = $m[1];
} else {
    echo "CSRF token not found\n";
    // still try without token
    $token = null;
}

$post = [
    '_token' => $token,
    'email' => $email,
    'password' => $password,
];

list($status, $header, $body) = curl_post($base.'/login', $post, $cookieJar);

echo "HTTP Status: $status\n";
// check redirect to /dashboard or presence of success message
if (strpos($header, 'Location:') !== false) {
    echo "Redirect headers:\n" . preg_replace('/\r/','',preg_replace('/\n\n.*$/s','', $header)) . "\n";
}
if (strpos($body, 'Login berhasil') !== false || strpos($body, 'dashboard') !== false) {
    echo "Login appears successful (body contains success or dashboard)\n";
} else {
    echo "Response body snippet:\n" . substr(strip_tags($body),0,400) . "\n";
}

// print cookies
echo "CookieJar: $cookieJar\n";

// additionally try to GET dashboard with cookie
list($dashBody) = [curl_get($base.'/dashboard', $dashCookieJar = $cookieJar)];
if (strpos($dashBody, 'Masuk ke Sistem') !== false) {
    echo "Dashboard requires auth - still showing login.\n";
} else {
    echo "Dashboard content snippet:\n" . substr(strip_tags($dashBody),0,400) . "\n";
}
