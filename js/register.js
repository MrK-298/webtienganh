window.onload = async function() {
    document.getElementById('signup-form').addEventListener('submit', function(event) {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmpassword').value;
        if (username.length < 8) {
            alert('Họ và tên phải có ít nhất 8 ký tự.');
            event.preventDefault();
            return;
        }
        if (password.length < 8) {
            alert('Mật khẩu phải có ít nhất 8 ký tự.');
            event.preventDefault();
            return;
        }     
        if (password !== confirmPassword) {
            alert('Xác nhận mật khẩu không khớp. Vui lòng nhập lại.');
            event.preventDefault();
            return;
        }
        var formData = new FormData(this); 
        fetch('http://localhost:8084/webtienganh/api/account/register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '../views/loginview.php';
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    });

}