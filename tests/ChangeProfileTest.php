<?php
require_once 'vendor/autoload.php';
require_once 'services/changeProfileService.php';
use PHPUnit\Framework\TestCase;
class ChangeProfileTest extends TestCase
{
  public function testChangeProfileSuccess() {
    $username= "binbb23";
    $email = "binbb1334@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name,$username)
                              ->willReturn(true);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name,$username);
    $this->assertTrue($result);
  }
  public function testChangeProfileWrongEmail() {
    $username= "binbb23";
    $email = "binbb1324gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name,$username)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name,$username);
    $this->assertFalse($result);
  } 
  public function testChangeProfileWrongPhone() {
    $username= "binbb23";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "093217144";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name,$username)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name,$username);
    $this->assertFalse($result);
  }
  public function testChangeProfileWrongName() {
    $username= "binbb23";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name,$username)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name,$username);
    $this->assertFalse($result);
  }
  public function testNoChangeProfile() {
    $username= "binbb23";
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name,$username)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name,$username);
    $this->assertFalse($result);
  }
} 
?>
