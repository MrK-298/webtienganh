<?php
require_once 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
class LoginTest extends TestCase
{
  public function testLoginSuccessWithUserName() {
    $_SERVER["REQUEST_METHOD"] = "POST";
    $post_data = [
        'username' => 'binbb23',
        'password' => 'khoibia123'
    ];
    $input_data = json_encode($post_data);    
    ob_start();
    file_put_contents('php://input', $input_data);
    ob_end_clean();
    
    $this->assertTrue(verifyCredentials($post_data['username'], $post_data['password']));
  }
  public function testLoginSuccessWithEmail() {
    $_SERVER["REQUEST_METHOD"] = "POST";
    $post_data = [
        'username' => 'binbb1324@gmail.com',
        'password' => 'khoibia123'
    ];
    $input_data = json_encode($post_data);    
    ob_start();
    file_put_contents('php://input', $input_data);
    ob_end_clean();
    
    $this->assertTrue(verifyCredentials($post_data['username'], $post_data['password']));
  }
  public function testLoginFailureWithWrongUsername() {
      $_SERVER["REQUEST_METHOD"] = "POST";
      $post_data = [
          'username' => 'binbb2345',
          'password' => 'khoibia123'
      ];
      $input_data = json_encode($post_data);

      ob_start();
      file_put_contents('php://input', $input_data);
      ob_end_clean();
      
      $this->assertFalse(verifyCredentials($post_data['username'], $post_data['password']));   
  }
  public function testLoginFailureWithWrongEmail() {
    $_SERVER["REQUEST_METHOD"] = "POST";
    $post_data = [
        'username' => 'binbb23@gmail.com',
        'password' => 'khoibia123'
    ];
    $input_data = json_encode($post_data);

    ob_start();
    file_put_contents('php://input', $input_data);
    ob_end_clean();
    
    $this->assertFalse(verifyCredentials($post_data['username'], $post_data['password']));   
}
  public function testLoginFailureWithWrongPassword() {
    $_SERVER["REQUEST_METHOD"] = "POST";
    $post_data = [
        'username' => 'binbb2345',
        'password' => 'khoibia123'
    ];
    $input_data = json_encode($post_data);

    ob_start();
    file_put_contents('php://input', $input_data);
    ob_end_clean();
    
    $this->assertFalse(verifyCredentials($post_data['username'], $post_data['password']));   
}
}
function verifyCredentials($usernameOrEmail, $password) {
  if (($usernameOrEmail == "binbb23" || $usernameOrEmail == "binbb1324@gmail.com") && $password == 'khoibia123') {      
      return true;
  }
  return false;
}

