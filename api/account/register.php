<?php
require '../../database/mongodb_connection.php';
require '../../function/sendmail.php';
$collection = connectToMongoDB("WebTiengAnh","User");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_data = file_get_contents("php://input");
    $post_data = json_decode($input_data, true);
    $username = $post_data['username'];
    $name = $post_data['name'];
    $phone = $post_data['phone'];
    $email = $post_data['email'];
    $password = $post_data['password'];
    $newUser = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'verificationCode' => null,
            'name' => $name,
            'phone' => $phone
    ];     
    try {
        $result = $collection->insertOne($newUser);       
        sendmail($email);
        $response = ['success' => true, 'message' => 'Đăng ký thành công'];       
        header('Content-Type: application/json');   
        echo json_encode($response);
    } catch (MongoDB\Driver\Exception\BulkWriteException $e) {
        $response = ['success' => false, 'message' => 'Đăng ký không thành công', 'error' => $e->getMessage()];
        header('Content-Type: application/json');   
        echo json_encode($response);           
    }        
}
?>