<?php
require '../../database/mongodb_connection.php';
require '../../function/generateJWT.php';
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
    session_start();
    $usernameOrEmail = $_POST['username'];
    $password = $_POST['password'];

    if (verifyCredentials($usernameOrEmail, $password)) {
        $user = $collection->findOne([
            '$or' => [
                ['username' => $usernameOrEmail],
                ['email' => $usernameOrEmail]
            ]
        ]);      
        $token = generateJWT($user['username'],$user['email'],$user['image']);    
        $_SESSION['login']['token'] = $token;
        $response = ['success' => true, 'token' => $token];
        header('Location:../../views/home.php');
    } else {
        $response = ['success' => false, 'message' => 'Đăng nhập thất bại. Vui lòng kiểm tra tên người dùng và mật khẩu.'];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>