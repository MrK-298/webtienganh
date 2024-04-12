<?php
require '../../database/mongodb_connection.php';
$collection = connectToMongoDB("WebTiengAnh","User");
if ($_SERVER["REQUEST_METHOD"] == "PUT")
{
    try {
        $input_data = file_get_contents("php://input");
        $put_data = json_decode($input_data, true);
        $email = $put_data['email'];
        $username = $put_data['username'];
        $phone = $put_data['phone'];
        $name = $put_data['name'];
        $user = $collection->findOne(['username' => $username]);
        $userId = $user['_id'];
        $filter = ['_id' => $userId];
        $update = ['$set' => ['email'=>$email,'phone'=>$phone,'name'=>$name]]; 
        $result = $collection->updateOne($filter, $update);
        if ($result->getModifiedCount() > 0) {
            $response = ['success' => true, 'message' => 'Đổi thông tin thành công'];
            header("HTTP/1.0 200 success");
        } else {
            $response = ['success' => false, 'message' => 'Lỗi'];
            header("HTTP/1.0 404 error");
        }         
        echo json_encode($response);
    }
    catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        header("HTTP/1.0 404 error");
    }
}
?>