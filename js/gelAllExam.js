window.onload = async function() {
    fetch('http://localhost:8084/webtienganh/api/exam/getAllExam.php')
    .then(response => response.json())
    .then(data => {
        const examList= document.getElementById('list-exam');
        data.forEach(exam => {
            const readingDiv = document.createElement('div');
            readingDiv.setAttribute('id',exam.name);
            readingDiv.className = 'col-lg-4 col-12';
            readingDiv.style.marginTop = '20px';
            const singleInfoDiv = document.createElement('div');
            singleInfoDiv.className = 'single-info';
            const icon = document.createElement('i');
            icon.className = 'fas fa-book-open';
            const contentDiv = document.createElement('div');
            contentDiv.className = 'content';
            const heading = document.createElement('h3');
            heading.textContent = 'Reading';
            const paragraph = document.createElement('p');
            paragraph.textContent = "Test " + exam.name;
            contentDiv.appendChild(heading);
            contentDiv.appendChild(paragraph);
            singleInfoDiv.appendChild(icon);
            singleInfoDiv.appendChild(contentDiv);
            readingDiv.appendChild(singleInfoDiv);
            examList.appendChild(readingDiv);
            singleInfoDiv.addEventListener('click',function(){
                window.location.href = `../views/exam.php?examname=${exam.name}`;
            });                   
        });
    });
}
