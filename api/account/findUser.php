<?php
require '../../database/mongodb_connection.php';
$collection = connectToMongoDB("WebTiengAnh","User");
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    try {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['username'])) {
                $username = $_GET['username'];
                $user = $collection->findOne(['username' => $username]);
                if ($user) {
                    echo json_encode($user);
                    header("HTTP/1.0 200 success");
                } else {
                    echo json_encode(['success' => false, 'message' => 'Không tìm thấy người dùng với email này!']);
                    header("HTTP/1.0 404 error");
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Vui lòng cung cấp email!']);
                header("HTTP/1.0 400 bad request");
            }
        }
    }
    catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        header("HTTP/1.0 404 error");
    }
}
?>