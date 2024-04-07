function sendCode() {
    var email = document.getElementById('email').value;    
    fetch('http://localhost:8084/webtienganh/api/account/sendcode.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json' 
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        if (data.success==true) {
            document.getElementById('password-form').setAttribute("style","display:block");
            document.getElementById('verificationCode-form').setAttribute("style","display:block");
            document.getElementById('confirmpassword-form').setAttribute("style","display:block");
        } else {
            alert(data.message,data.error);
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
    });
}
function changePassword(){
    var email = document.getElementById('email').value;    
    var code = document.getElementById('verificationCode').value;    
    var password = document.getElementById('password').value; 
    var confirmPassword = document.getElementById('confirmpassword').value; 
    if (password !== confirmPassword) {
        alert('Xác nhận mật khẩu không khớp. Vui lòng nhập lại.');
        return;
    }
    fetch('http://localhost:8084/webtienganh/api/account/forgotpassword.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json' 
        },
        body: JSON.stringify({email: email,password:password,verificationCode: code })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success == true) {       
            alert("Đổi mật khẩu thành công");
            window.location.href = '../views/loginview.php';
        } else {
            alert(data.message,data.error);
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
    });
}
const sendcodeBtn = document.getElementById('send-code-btn');
sendcodeBtn.addEventListener('click', sendCode);
const recoverBtn = document.getElementById('recover-btn');
recoverBtn.addEventListener('click', changePassword);