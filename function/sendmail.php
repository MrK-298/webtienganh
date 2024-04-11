<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

function sendmail($email){
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hpcdot197@gmail.com';
        $mail->Password = 'nyul hzxu lcol hqis';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
        $mail->setFrom("hpcdot197@gmail.com", "8Bit");
        $mail->addAddress($email);
        $mail->Subject = "=?UTF-8?B?" . base64_encode("Đăng ký tài khoản") . "?=";
        $mail->Body = ("Đăng ký tài khoản thành công");
        $mail->send();     
    } catch (Exception $e) {
        echo "Có lỗi xảy ra khi gửi email: " . $e->getMessage();
    }
}
function sendcode($email,$verificationCode){
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hpcdot197@gmail.com';
        $mail->Password = 'nyul hzxu lcol hqis';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
        $mail->setFrom("hpcdot197@gmail.com", "8Bit");
        $mail->addAddress($email);
        $mail->Subject = "=?UTF-8?B?" . base64_encode("Mã để cài lại mật khẩu") . "?=";
        $mail->Body = 'Mã là: ' . $verificationCode;
        $mail->send();      
    } catch (Exception $e) {
        echo "Có lỗi xảy ra khi gửi email: " . $e->getMessage();
    }
}