function changeProfile() {  
    var email = document.getElementById('email').value;  
    const urlParams = new URLSearchParams(window.location.search);
    const username = urlParams.get('username');   
    var phone = document.getElementById('phone').value;    
    var name = document.getElementById('name').value;  
    if(isValidGmail(email)==false)
    {
        alert('gmail sai định dạng');
        event.preventDefault();
        return;
    }
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
        body: JSON.stringify({ email: email, phone:phone, name:name,username:username })
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
function isValidVietnamesePhoneNumber(phoneNumber) {
    var regex = /^(0|\+84)(\d{9,10})$/;
    return regex.test(phoneNumber);
}
function isValidGmail(email) {
    var regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    return regex.test(email);
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