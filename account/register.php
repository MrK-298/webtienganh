<?php
require_once(dirname(__DIR__) . '/database/mongodb_connection.php');
$collection = connectToMongoDB("WebTiengAnh","User");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password == $confirmpassword)
    {
        $newUser = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
        ];
        $result = $collection->insertOne($newUser);
        session_start();   
        if ($result->getInsertedCount() === 1) {
            $_SESSION['success_message'] = "Đăng ký thành công.";
        } else {
            $_SESSION['error_message'] = "Đăng ký thất bại.";
        }
        header("Location: ../views/loginview.php");
        exit();      
    }
}
?>