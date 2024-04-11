function changeProfile() {  
    var email = document.getElementById('email').value;    
    var phone = document.getElementById('phone').value;    
    var name = document.getElementById('name').value;  
    if(isValidVietnamesePhoneNumber(phone)==false)
    {
        alert('số điện thoại sai định dạng. Vui lòng nhập lại.');
        return;
    }
    if (name.length < 8 || name.length > 30) {
        alert('Họ và tên phải nằm trong 8 đến 30 ký tự');
        return;
    }
    fetch('http://localhost:8084/webtienganh/api/account/changeProfile.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json' 
        },
        body: JSON.stringify({ email: email, phone:phone, name:name })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success == true) {       
            alert("Đổi thông tin thành công");
        } else {
            alert(data.message,data.error);
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
    });
}
const submitButton = document.getElementById('save');
submitButton.addEventListener('click', changeProfile);
window.onload = async function getExamName() {
    const urlParams = new URLSearchParams(window.location.search);
    const username = urlParams.get('username');
    fetch(`http://localhost:8084/webtienganh/api/account/findUser.php?username=${username}`)
    .then(response => response.json())
    .then(data => {
        var nameInput = document.getElementById("name");
        var emailInput = document.getElementById("email");
        var phoneInput = document.getElementById("phone");
        nameInput.value = data.name;
        emailInput.value = data.email;
        phoneInput.value = data.phone;
    });
}