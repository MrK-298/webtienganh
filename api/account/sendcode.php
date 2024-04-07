<?php
require '../../database/mongodb_connection.php';
require '../../function/sendmail.php';
$collection = connectToMongoDB("WebTiengAnh","User");
function generateRandomCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomCode = '';
    $maxIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, $maxIndex)];
    }

    return $randomCode;
}
if ($_SERVER["REQUEST_METHOD"] == "PUT")
{
    try {
        $input_data = file_get_contents("php://input");
        $put_data = json_decode($input_data, true);
        $email = $put_data['email'];
        $verificationCode = generateRandomCode();
        sendcode($email, $verificationCode);
        $user = $collection->findOne(['email' => $email]);
        if ($user) {
            $userId = $user['_id'];
            $filter = ['_id' => $userId]; 
            $update = ['$set' => ['verificationCode' => $verificationCode]]; 
            $result = $collection->updateOne($filter, $update);
            if ($result->getModifiedCount() > 0) {
                $response = ['success' => true, 'message' => 'Mã xác nhận đã được gửi và cập nhật thành công!'];
                header("HTTP/1.0 200 success");
            } else {
                $response = ['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật mã xác nhận!'];
                header("HTTP/1.0 404 error");
            }
        } else {
            $response = ['success' => false, 'message' => 'Không tìm thấy người dùng với email này!'];
            header("HTTP/1.0 404 error");
        }
        echo json_encode($response);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        header("HTTP/1.0 404 error");
    }
}
?>