<?php
require '../../database/mongodb_connection.php';
require '../../function/sendmail.php';
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
        header('Content-Type: application/json'); 
        try {
            $result = $collection->insertOne($newUser);
            if ($result->getInsertedCount() === 1) {
                $response = ['success' => true, 'user' => $newUser];
                sendmail($email);
                header("HTTP/1.0 200 success");
            } else {
                $response = ['success' => false, 'message' => 'Đăng ký thất bại', 'error' => 'Unknown error'];
                header("HTTP/1.0 404 error");
            }
            echo json_encode($response);
        } catch (MongoDB\Driver\Exception\BulkWriteException $e) {
            $response = ['success' => false, 'message' => 'Đăng ký thất bại', 'error' => $e->getMessage()];
            echo json_encode($response);
            header("HTTP/1.0 404 error");
        }        
    }
}
?>