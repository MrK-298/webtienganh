<?php
require_once 'vendor/autoload.php';
require_once 'services/registerService.php';
use PHPUnit\Framework\TestCase;
class RegisterTest extends TestCase
{
  public function testRegisterSuccess() {
    $username = "binbb23";
    $password = "khoibia123";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $registerServiceMock = $this->getMockBuilder(RegisterService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $registerServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($username,$password,$email,$phone,$name)
                              ->willReturn(true);

    $result = $registerServiceMock->register($username,$password,$email,$phone,$name);
    $this->assertTrue($result);
  }
  public function testRegisterWrongUsername() {
    $username = "binbb2";
    $password = "khoibia123";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $registerServiceMock = $this->getMockBuilder(RegisterService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $registerServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($username,$password,$email,$phone,$name)
                              ->willReturn(null);

    $result = $registerServiceMock->register($username,$password,$email,$phone,$name);
    $this->assertFalse($result);
  }
  public function testRegisterWrongEmail() {
    $username = "binbb23";
    $password = "khoibia123";
    $email = "binbb1324gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $registerServiceMock = $this->getMockBuilder(RegisterService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $registerServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($username,$password,$email,$phone,$name)
                              ->willReturn(null);

    $result = $registerServiceMock->register($username,$password,$email,$phone,$name);
    $this->assertFalse($result);
  } 
  public function testRegisterWrongPhone() {
    $username = "binbb23";
    $password = "khoibia123";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "093217144";
    $registerServiceMock = $this->getMockBuilder(RegisterService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $registerServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($username,$password,$email,$phone,$name)
                              ->willReturn(null);

    $result = $registerServiceMock->register($username,$password,$email,$phone,$name);
    $this->assertFalse($result);
  }
  public function testRegisterWrongName() {
    $username = "binbb23";
    $password = "khoibia123";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn";
    $phone = "0932171448";
    $registerServiceMock = $this->getMockBuilder(RegisterService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $registerServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($username,$password,$email,$phone,$name)
                              ->willReturn(null);

    $result = $registerServiceMock->register($username,$password,$email,$phone,$name);
    $this->assertFalse($result);
  }
  public function testRegisterWrongPassword() {
    $username = "binbb23";
    $password = "khoibia";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $registerServiceMock = $this->getMockBuilder(RegisterService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $registerServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($username,$password,$email,$phone,$name)
                              ->willReturn(null);

    $result = $registerServiceMock->register($username,$password,$email,$phone,$name);
    $this->assertFalse($result);
  }
}
