<?php
require_once 'vendor/autoload.php';
require_once 'services/changeProfileService.php';
use PHPUnit\Framework\TestCase;
class ChangeProfileTest extends TestCase
{
  public function testChangeProfileSuccess() {
    $email = "binbb1334@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name)
                              ->willReturn(true);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name);
    $this->assertTrue($result);
  }
  public function testChangeProfileWrongEmail() {
    $email = "binbb1324gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name);
    $this->assertFalse($result);
  } 
  public function testChangeProfileWrongPhone() {
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "093217144";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name);
    $this->assertFalse($result);
  }
  public function testChangeProfileWrongName() {
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name);
    $this->assertFalse($result);
  }
  public function testNoChangeProfile() {
    $email = "binbb1324@gmail.com";
    $name = "Nguyễn Hoàng Khôi";
    $phone = "0932171448";
    $changeProfileServiceMock = $this->getMockBuilder(ChangeProfileService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $changeProfileServiceMock->expects($this->once())
                              ->method('verifyCredentials')
                              ->with($email,$phone,$name)
                              ->willReturn(null);

    $result = $changeProfileServiceMock->changeProfile($email,$phone,$name);
    $this->assertFalse($result);
  }
} 
?>
