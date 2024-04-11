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
        $score = $post_data['score'];
        $user = $collectionUser->findOne(['email'=>$email]);
        $examname = $post_data['exam'];
        $exam = $collectionExam->findOne(['name' => $examname]);
        $arrJSON = $post_data['arr'];
        $arr = json_decode($arrJSON, true);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = new DateTime();
        $createAt = $currentDateTime->format('Y-m-d H:i:s');;
        $filter = [
            'userId' => $user['_id'],
            'examId' => $exam['_id']
        ];        
        $update = [
            '$set' => [
                'score' => $score,
                'Answers' => $arr,
                'create_at' => $createAt
            ]
        ];       
        $options = [
            'upsert' => true,
        ];      
        $result = $detailExam->findOneAndUpdate($filter, $update, $options);     
        if ($result) {
            $response = ['success' => true, 'detailExam' => $result];
            header("HTTP/1.0 200 success");
        } else {
            $response = ['success' => true, 'message' => 'Nộp bài thành công'];
            header("HTTP/1.0 404 error");
        }        
        echo json_encode($response);       
    }
    catch (Exception $e) {
        $response = ['success' => false, 'message' => 'Nộp bài thất bại', 'error' => $e->getMessage()];
        echo json_encode($response);
        header("HTTP/1.0 404 error");
    }
}
?>