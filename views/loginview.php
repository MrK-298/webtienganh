<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <?php if (isset($_SESSION['success_message'])) : ?>
    <script>
        alert('<?php echo $_SESSION['success_message']; ?>');
    </script>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])) : ?>
    <script>
        alert('<?php echo $_SESSION['error_message']; ?>');
    </script>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>
    <div class="container">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="../images/img2.jpg" alt="">
          <div class="text">
            <span class="text-1">Hãy đến với 8Bit <br>Website học tiếng anh</span>
            <span class="text-2">Hiệu quả nhanh chóng và trãi nghiệm</span>
          </div>
        </div>
      </div>
      <div class="forms">
          <div class="form-content">
            <div class="login-form">
              <div class="title">Login</div>
            <form action="../account/login.php" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="username" placeholder="Nhập email của bạn" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                  <div id="eye">

                  </div>
                </div>
                <div class="text"><a href="#">Quên mật khẩu?</a></div>
                <div class="button input-box">
                  <input type="submit" value="Đăng nhập">
                </div>
                <div class="text sign-up-text">Bạn chủa có tài khoản? <label for="flip">Đăng ký ngay</label></div>
              </div>
          </form>
        </div>
          <div class="signup-form">
            <div class="title">Register</div>
          <form action="../account/register.php" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" name="username" placeholder="Nhập họ và tên" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="Nhập email của bạn" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                  <div id="eye-signup">
                    <i class="far fa-eye"></i>
                  </div>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="confirmpassword" placeholder="Nhập lại mật khẩu của bạn" required>
                  <div id="eye-signup2">
                    <i class="far fa-eye"></i>
                  </div>
                </div>
                <div class="button input-box">
                  <input type="submit" value="Đăng ký">
                </div>
                <div class="text sign-up-text">Bạn đã có tài khoản? <label for="flip">Đăng nhập ngay</label></div>
              </div>
        </form>
      </div>
      </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="js/app.js"></script>
</html>