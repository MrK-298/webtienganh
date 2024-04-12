<?php
require_once 'vendor/autoload.php';
require_once 'services/loginService.php';
use PHPUnit\Framework\TestCase;
class LoginTest extends TestCase
{
  public function testLoginSuccessWithUserName() {
    $usernameOrEmail = 'binbb23';
    $password = 'khoibia123';

    $authenticationServiceMock = $this->getMockBuilder(AuthenticationService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $authenticationServiceMock->expects($this->once())
                             ->method('verifyCredentials')
                             ->with($usernameOrEmail, $password)
                             ->willReturn(true);

    $result = $authenticationServiceMock->login($usernameOrEmail, $password);
    $this->assertTrue($result);
  }
  public function testLoginSuccessWithEmail() {
    $usernameOrEmail = 'binbb1324@gmail.com';
    $password = 'khoibia123';

    $authenticationServiceMock = $this->getMockBuilder(AuthenticationService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $authenticationServiceMock->expects($this->once())
                             ->method('verifyCredentials')
                             ->with($usernameOrEmail, $password)
                             ->willReturn(true);

    $result = $authenticationServiceMock->login($usernameOrEmail, $password);
    $this->assertTrue($result);
  }
  public function testLoginFailureWithWrongUsername() {
    $usernameOrEmail = 'binbb234';
    $password = 'khoibia123';

    $authenticationServiceMock = $this->getMockBuilder(AuthenticationService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $authenticationServiceMock->expects($this->once())
                             ->method('verifyCredentials')
                             ->with($usernameOrEmail, $password)
                             ->willReturn(null);

    $result = $authenticationServiceMock->login($usernameOrEmail, $password);
    $this->assertFalse($result);
  }
  public function testLoginFailureWithWrongEmail() {
    $usernameOrEmail = 'binbb23@gmail.com';
    $password = 'khoibia123';

    $authenticationServiceMock = $this->getMockBuilder(AuthenticationService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $authenticationServiceMock->expects($this->once())
                             ->method('verifyCredentials')
                             ->with($usernameOrEmail, $password)
                             ->willReturn(null);

    $result = $authenticationServiceMock->login($usernameOrEmail, $password);
    $this->assertFalse($result);
}
  public function testLoginFailureWithWrongPassword() {
    $usernameOrEmail = 'binbb23';
    $password = 'khoibia12345';

    $authenticationServiceMock = $this->getMockBuilder(AuthenticationService::class)
                                      ->onlyMethods(array('verifyCredentials'))
                                      ->getMock();

    $authenticationServiceMock->expects($this->once())
                             ->method('verifyCredentials')
                             ->with($usernameOrEmail, $password)
                             ->willReturn(null);

    $result = $authenticationServiceMock->login($usernameOrEmail, $password);
    $this->assertFalse($result);
  }
}

