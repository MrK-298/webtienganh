<?php
require '../../database/mongodb_connection.php';
$detailExam = connectToMongoDB("WebTiengAnh","DetailExam");
$collectionExam = connectToMongoDB("WebTiengAnh","Exam");
$collectionUser = connectToMongoDB("WebTiengAnh","User");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $input_data = file_get_contents("php://input");
        $post_data = json_decode($input_data, true);
        $email = $post_data['email'];
        $user = $collectionUser->findOne(['email'=>$email]);
        $detail = $detailExam->find(['userId' => $user['_id']]);
        if ($detail) {
            header('Content-Type: application/json');
            echo json_encode(iterator_to_array($detail)); 
        } else {
            $response = ['success' => false, 'message' => 'Lấy không thành công'];
            header("HTTP/1.0 404 error");
            echo json_encode($response);  
        }             
    }
    catch (Exception $e) {
        $response = ['success' => false, 'message' => 'Lấy không thành công', 'error' => $e->getMessage()];
        echo json_encode($response);
        header("HTTP/1.0 404 error");
    }
}
?>