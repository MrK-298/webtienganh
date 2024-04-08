<?php
require '../../database/mongodb_connection.php';
$collection = connectToMongoDB("WebTiengAnh","Exam");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        $examname = $_GET['examname'];
        $exam = $collection->findOne(['name' => $examname]);
        $examArray = iterator_to_array($exam);
        header('Content-Type: application/json');
        echo json_encode($examArray);
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'message' => 'Error: ' . $e->getMessage()));
    }
}
?>