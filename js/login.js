async function login() {
    var username = document.getElementById('current-username').value;
    var password = document.getElementById('current-password').value;
    if (username.length < 6 && isValidGmail(username)) {
        alert('username phải có ít nhất 6 ký tự hoặc đúng định dạng gmail.');
        return;
    }
    if (password.length < 8) {
        alert('Mật khẩu phải có ít nhất 8 ký tự.');
        return;
    }                
    fetch('http://localhost:8084/webtienganh/api/account/login.php', {
        method: 'POST',
        body: JSON.stringify({username:username,password:password})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success == true) {               
            alert("Đăng nhập tài khoản thành công");
            window.location.href = '../views/home.php';
        } else {
            alert(data.message,data.error);
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
    });
}
function isValidGmail(email) {
    var regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    return regex.test(email);
}
const submitButton = document.getElementById('btn-login');
submitButton.addEventListener('click', login);