<?php
require '../../database/mongodb_connection.php';
$collection = connectToMongoDB("WebTiengAnh","User");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_data = file_get_contents("php://input");
    $post_data = json_decode($input_data, true);
    $usernameOrEmail = $post_data['username'];
    $password = $post_data['password'];
    if (verifyCredentials($usernameOrEmail, $password)) {
        $user = $collection->findOne([
            '$or' => [
                ['username' => $usernameOrEmail],
                ['email' => $usernameOrEmail]
            ]
        ]);         
        $_SESSION['login']['username'] = $user['username'];
        $_SESSION['login']['email'] = $user['email'];
        $response = ['success' => true, 'data' => $user];
        header("HTTP/1.0 200 success");
    } else {
        $response = ['success' => false, 'message' => 'Đăng nhập thất bại. Vui lòng kiểm tra tên người dùng và mật khẩu.'];
        header("HTTP/1.0 401 error");
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
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
?>