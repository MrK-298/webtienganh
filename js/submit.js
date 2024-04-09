async function submitAnswers() {
    var array = [];
    var correctAnswers = 0;
    var totalQuestions = 0;
    const urlParams = new URLSearchParams(window.location.search);
    const examName = urlParams.get('examname');
    fetch(`http://localhost:8084/webtienganh/api/exam/getExam.php?examname=${examName}`)
    .then(response => response.json())
    .then(data => {
        const part7Questions = data.Questions.filter(question => question.type === "Part 7");
        part7Questions.forEach((question, index) => {
            question.SubQuestions.forEach((subQuestion, subIndex) => {
                totalQuestions++;
                const selectedAnswers = document.querySelectorAll(`input[name="question${index + 1}_${subIndex + 1}"]:checked`);
                selectedAnswers.forEach(selectedAnswer => {
                    const selectedValue = selectedAnswer.value;
                    const answer = question.Answers.find(answer => answer.text === selectedValue);
                    const correctAnswer = question.Answers.find(p=>p.isTrue === true);
                    if (answer && answer.isTrue) {
                        correctAnswers++;
                    }
                    const newObj = {
                        selectedValue: selectedValue, 
                        correctAnswer: correctAnswer.text
                    };
                    array.push(newObj);
                });
            });
        });
        const part5Questions = data.Questions.filter(question => question.type === "Part 5");
        part5Questions.forEach((question, index) => {
            totalQuestions++;
            const selectedAnswers = document.querySelectorAll(`input[name="question${index + 1}"]:checked`);
            selectedAnswers.forEach(selectedAnswer => {
                const selectedValue = selectedAnswer.value;             
                const answer = question.Answers.find(answer => answer.text === selectedValue);
                const correctAnswer = question.Answers.find(p=>p.isTrue === true);
                if (answer && answer.isTrue) {
                    correctAnswers++;
                }
                const newObj = {
                    selectedValue: selectedValue, 
                    correctAnswer: correctAnswer.text
                };
                array.push(newObj);
            });
        });
        if (confirm("Bạn có chắc muốn nộp bài không?")) {
            alert(`Số câu bạn đã trả lời đúng là: ${correctAnswers} trong tổng số ${totalQuestions} câu.`);
            DetailExam(examName,array);
        }
    }); 
}
const submitButton = document.getElementById('submit-button');
submitButton.addEventListener('click', submitAnswers);
function DetailExam(exam,arr){
    const email = document.getElementById("email").getAttribute("value");
    const arrJSON = JSON.stringify(arr);
    const requestBody = JSON.stringify({ email: email, exam: exam, arr: arrJSON });
    fetch(`http://localhost:8084/webtienganh/api/exam/detailExam.php`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' 
        },
        body: requestBody
    })
    .then(response => response.json())
    .then(data => {
        if (data.success == true) {       
            alert("Nộp bài thành công");
        } else {
            alert(data.message,data.error);
        }
    });
}