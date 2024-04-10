var name = "";
window.onload = async function getDetail() {
    const email = document.getElementById("email").getAttribute("value");
    fetch(`http://localhost:8084/webtienganh/api/exam/getListExam.php`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' 
        },
        body: JSON.stringify({email: email})
    })
    .then(response => response.json())
    .then(data => {
        data.forEach((item, index) => {
            const table = document.getElementById('list-exam');
            const row = table.insertRow();
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);
            const cell4 = row.insertCell(3);
            getExamName(item.examId["$oid"], function(name) {
                cell1.innerHTML= item.create_at;
                cell2.innerHTML = "Test " + name;
                cell3.innerHTML = item.score + "/84";
                const button1 = document.createElement('button');
                button1.textContent = 'Xem chi tiết / ';
                button1.onclick = function() {
                    window.location.href = `../views/answer.php?examname=${name}`;
                };
                const button2 = document.createElement('button');
                button2.textContent = 'Làm lại';
                button2.onclick = function() {
                    window.location.href = `../views/exam.php?examname=${name}`;
                };
                cell4.appendChild(button1);
                cell4.appendChild(button2);
            });
            
        });
    }); 
}
function getExamName(examId, callback) {
    fetch(`http://localhost:8084/webtienganh/api/exam/getExamById.php?examId=${examId}`)
    .then(response => response.json())
    .then(data => {
        callback(data.name);
    });
}


