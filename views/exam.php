<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title>Thi Trắc Nghiệm</title>
<link rel="stylesheet" href="../css/exam.css">
</head>
<body>
<?php
if(isset($_SESSION['login']['email'])) {
    echo '<div value="' . $_SESSION['login']['email'] . '" style="display:none" id="email"></div>';
}                                
?>        
<div id="quiz-container">
<div id="part5"></div>
<div id="part7" style="display:none"></div>
<div id="next" style="margin-left:1250px">
    <a>Tiếp theo</a>
    <span class="fa fa-chevron-right ml-2"></span>
</div>
<div id="previous" style="display:none">
    <span class="fa fa-chevron-left ml-2"></span>
    <a>Trang trước</a>
</div>
</div>
<div id="question-list">
<h2>Danh sách câu</h2>
<button id="submit-button" type="submit">Nop bai</button>
<br></br>
</div>
<script src="../js/pagination.js"></script>
<script src="../js/getExam.js"></script>
<script src="../js/submit.js"></script>
</body>
</html>
