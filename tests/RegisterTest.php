<?php
require_once 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
class RegisterTest extends TestCase
{
  public function testRegisterSuccess() {
    $_SERVER["REQUEST_METHOD"] = "POST";
    $post_data = [
        'username' => 'binbb23',
        'password' => 'khoibia123',
        'email' => 'binbb1324@gmail.com',
        'name' => 'Nguyễn Hoàng Khôi',
        'phone' => '0932171448',
    ];
    $input_data = json_encode($post_data);    
    ob_start();
    file_put_contents('php://input', $input_data);
    ob_end_clean();  
    $this->assertTrue(isValidEmail($post_data['email']));
    $this->assertTrue(isValidName($post_data['name']));
    $this->assertTrue(isValidPhoneNumber($post_data['phone']));
    $this->assertTrue(isValidPassword($post_data['password']));
    $this->assertTrue(isValidUserName($post_data['username']));
  }
}
function isValidEmail($email) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {      
      return true;
  }
  return false;
}
function isValidPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
    $result = preg_match('/^(0(9|\d{2})|\d{3})\d{7}$/', $phoneNumber);
    if($result == 1)
    {
        return true;
    }
    return false;
}
function isValidPassword($password) {
    if (strlen($password)<8) {      
        return false;
    }
    return true;
}
function isValidName($name) {
    if (strlen($name)<8 && strlen($name)>30) {      
        return false;
    }
    return true;
}
function isValidUserName($username) {
    if (strlen($username)<7) {      
        return false;
    }
    return true;
}


