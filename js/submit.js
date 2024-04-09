var array = [];
var correctAnswers = 0;
var totalQuestions = 0;
async function submitAnswers() {
    const urlParams = new URLSearchParams(window.location.search);
    const examName = urlParams.get('examname');
    fetch(`http://localhost:8084/webtienganh/api/exam/getExam.php?examname=${examName}`)
    .then(response => response.json())
    .then(async data => {
        await submitPart5(data);
        await submitPart7(data);
        if (confirm("Bạn có chắc muốn nộp bài không?")) {
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
            localStorage.clear();
            window.location.href = `../views/answer.php?examname=${exam}`;
        } else {
            alert(data.message,data.error);
        }
    });
}
async function submitPart5(data)
{
    const part5Questions = data.Questions.filter(question => question.type === "Part 5");
    part5Questions.forEach((question, index) => {
        let select = "Chưa trả lời";
        let correct;
        totalQuestions++;
        const selectedAnswers = document.querySelectorAll(`input[name="question${index + 1}"]`);
        selectedAnswers.forEach(selectedAnswer => {
            const selectedValue = selectedAnswer.value;             
            const answer = question.Answers.find(answer => answer.text === selectedValue);
            const correctAnswer = question.Answers.find(p=>p.isTrue === true);
            correct = correctAnswer.text;
            select = selectedAnswer.checked ? selectedValue : select;
            if (selectedAnswer.checked && answer.isTrue) {
                correctAnswers++;              
            }           
        });
        const newObj = {
            selectedValue: select, 
            correctAnswer: correct
        };
        array.push(newObj);
    });
}
async function submitPart7(data)
{
    const part7Questions = data.Questions.filter(question => question.type === "Part 7");
    part7Questions.forEach((question, index) => {
        question.SubQuestions.forEach((subQuestion, subIndex) => {
            let select = "Chưa trả lời";
            let correct;
            totalQuestions++;
            const selectedAnswers = document.querySelectorAll(`input[name="question${index + 1}_${subIndex + 1}"]`);
            selectedAnswers.forEach(selectedAnswer => {
                const selectedValue = selectedAnswer.value;
                const answer = subQuestion.Answers.find(p=>p.text===selectedValue);
                const correctAnswer = subQuestion.Answers.find(p=>p.isTrue === true);
                correct = correctAnswer.text
                select = selectedAnswer.checked ? selectedValue : select;
                if (selectedAnswer.checked && answer.isTrue) {
                    correctAnswers++;               
                }              
            });
            const newObj = {
                selectedValue: select, 
                correctAnswer: correct
            };
            array.push(newObj);
        });
    });     
}