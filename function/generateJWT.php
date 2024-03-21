<?php
function generateJWT($username,$email) {
    $secretKey = bin2hex(random_bytes(32));
    $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
    $payload = base64_encode(json_encode(
        [
            'username' => $username,
            'email' => $email, 
            'exp' => time() + (60 * 60)
        ]));
    $signature = base64_encode(hash_hmac('sha256', $header . '.' . $payload, $secretKey, true));
    return $header . '.' . $payload . '.' . $signature;
}
?>