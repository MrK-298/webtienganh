<?php
require_once(dirname(__DIR__) . '/database/mongodb_connection.php');
require_once(dirname(__DIR__) . '/function/generateJWT.php');
$collection = connectToMongoDB("WebTiengAnh","User");
function verifyCredentials($usernameOrEmail, $password) {
    global $collection;

    $user = $collection->findOne([
        '$or' => [
            ['username' => $usernameOrEmail],
            ['email' => $usernameOrEmail]
        ]
    ]);

    if ($user) { 
        if ((password_verify($password,$user['password']))) {
            return true;
        }
    }

    return false;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = $_POST['username'];
    $password = $_POST['password'];

    if (verifyCredentials($usernameOrEmail, $password)) {
        $user = $collection->findOne([
            '$or' => [
                ['username' => $usernameOrEmail],
                ['email' => $usernameOrEmail]
            ]
        ]);
        $token = generateJWT($user['username'],$user['email']);
        $response = array('success' => true, 'message' => 'Đăng nhập thành công.', 'token' => $token);
    } else {
        $response = array('success' => false, 'message' => 'Đăng nhập thất bại. Vui lòng kiểm tra tên người dùng và mật khẩu.');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>