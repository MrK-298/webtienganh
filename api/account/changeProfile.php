<?php
require '../../database/mongodb_connection.php';
$collection = connectToMongoDB("WebTiengAnh","User");
if ($_SERVER["REQUEST_METHOD"] == "PUT")
{
    try {
        $input_data = file_get_contents("php://input");
        $put_data = json_decode($input_data, true);
        $email = $put_data['email'];
        $verificationCode = $put_data['verificationCode'];
        $password = $put_data['password'];
        $user = $collection->findOne(['email' => $email]);
        if ($user) {
            $userId = $user['_id'];
            $userCode = $user['verificationCode'];
            $filter = ['_id' => $userId];
            if($userCode == $verificationCode)
            {
                $update = ['$set' => ['password' => password_hash($password, PASSWORD_DEFAULT)]]; 
                $result = $collection->updateOne($filter, $update);
                if ($result->getModifiedCount() > 0) {
                    $response = ['success' => true, 'message' => 'Đổi mật khẩu thành công'];
                    header("HTTP/1.0 200 success");
                } else {
                    $response = ['success' => false, 'message' => 'Lỗi'];
                    header("HTTP/1.0 404 error");
                }
            }
            else {
                $response = ['success' => false, 'message' => 'Sai mã xác nhận'];
                header("HTTP/1.0 404 error");
            }
        } else {
            $response = ['success' => false, 'message' => 'Không tìm thấy người dùng với email này!'];
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