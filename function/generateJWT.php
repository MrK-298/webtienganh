<?php
use \Firebase\JWT\JWT;
$secretKey = bin2hex(random_bytes(32));
function generateJWT($username,$email,$image) {
    $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
    $payload = base64_encode(json_encode(
        [
            'username' => $username,
            'email' => $email, 
            'image' => $image,
            'exp' => time() + (60 * 60)
        ]));
    $signature = base64_encode(hash_hmac('sha256', $header . '.' . $payload, $secretKey, true));
    return $header . '.' . $payload . '.' . $signature;
}
function decodeJWT($token){
    try {
        list($header, $payload, $signature) = explode('.', $token);
        $validSignature = hash_hmac('sha256', $header . '.' . $payload, $secretKey, true);
        if (base64_encode($validSignature) !== $signature) {
            throw new Exception('Chữ ký không hợp lệ');
        }
        $decodedPayload = base64_decode($payload);
        $decodedPayloadArray = json_decode($decodedPayload, true);
        if (isset($decodedPayloadArray['exp']) && $decodedPayloadArray['exp'] < time()) {
            throw new Exception('Token đã hết hạn');
        }
        return $decodedPayloadArray;
    } catch (Exception $e) {
        return null;
    }
}
?>