<?php
require '../../database/mongodb_connection.php';
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
            'image' => null,
            'verificationCode' => null
        ];
        $result = $collection->insertOne($newUser);
        if ($result->getInsertedCount() === 1) {
            $response = array('success' => true,'user' =>$newUser);
        } else {
            $response = array('success' => false,'message' =>'Đăng ký thất bại');
        }     
    }
}
?>