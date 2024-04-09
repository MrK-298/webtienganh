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
        $examname = $post_data['exam'];
        $exam = $collectionExam->findOne(['name' => $examname]);
        $arrJSON = $post_data['arr'];
        $arr = json_decode($arrJSON, true);
        if($arr)
        {
            $newdetail = [
                'userId' => $user['_id'],
                'examId' => $exam['_id'],
                'Answer' => $arr
            ];
            header('Content-Type: application/json');
            $result = $detailExam->insertOne($newdetail);
            if ($result->getInsertedCount() === 1) {
                $response = ['success' => true, 'detailExam' => $newdetail];
                header("HTTP/1.0 200 success");
            } else {
                $response = ['success' => false, 'message' => 'Nộp bài thất bại', 'error' => 'Unknown error'];
                header("HTTP/1.0 404 error");
            }
        }
        else
        {
            $response = ['success' => false, 'message' => 'Nộp bài thất bại', 'error' => 'Unknown error'];
            header("HTTP/1.0 404 error");
        }
        echo json_encode($response);
    } catch (Exception $e) {
        $response = ['success' => false, 'message' => 'Nộp bài thất bại', 'error' => $e->getMessage()];
        echo json_encode($response);
        header("HTTP/1.0 404 error");
    }
}
?>