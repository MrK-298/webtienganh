window.onload = async function() {
    document.getElementById('signup-form').addEventListener('submit', function(event) {
        var username = document.getElementById('username').value;
        var name = document.getElementById('name').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmpassword').value;
        var phone = document.getElementById('phone').value;
        if(isValidVietnamesePhoneNumber(phone)==false)
        {
            alert('số điện thoại sai định dạng. Vui lòng nhập lại.');
            event.preventDefault();
            return;
        }
        if (name.length < 8 || name.length > 30) {
            alert('Họ và tên phải nằm trong 8 đến 30 ký tự');
            event.preventDefault();
            return;
        }
        if (username.length < 6) {
            alert('username phải có ít nhất 6 ký tự.');
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
        .then(async data => {
            if (data.success == true) {               
                await alert("Đăng ký tài khoản thành công");
                window.location.href = '../views/loginview.php';
            } else {
                alert(data.message,data.error);
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    });

}
function isValidVietnamesePhoneNumber(phoneNumber) {
    var regex = /^(0|\+84)(\d{9,10})$/;
    return regex.test(phoneNumber);
}