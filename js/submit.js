async function submitAnswers() {
    var correctAnswers = 0;
    var totalQuestions = 0;
    
    fetch('http://localhost:8084/webtienganh/api/exam/getExam.php')
    .then(response => response.json())
    .then(data => {
        const part7Questions = data.Questions.filter(question => question.type === "Part 7");
        part7Questions.forEach((question, index) => {
            question.SubQuestions.forEach((subQuestion, subIndex) => {
                totalQuestions++;
                const selectedAnswers = document.querySelectorAll(`input[name="question${index + 1}_${subIndex + 1}"]:checked`);
                selectedAnswers.forEach(selectedAnswer => {
                    const selectedValue = selectedAnswer.value;
                    const correctAnswer = subQuestion.Answers.find(answer => answer.text === selectedValue);
                    if (correctAnswer && correctAnswer.isTrue) {
                        correctAnswers++;
                    }
                });
            });
        });
    
        const part5Questions = data.Questions.filter(question => question.type === "Part 5");
        part5Questions.forEach((question, index) => {
            totalQuestions++;
            const selectedAnswers = document.querySelectorAll(`input[name="question${index + 1}"]:checked`);
            selectedAnswers.forEach(selectedAnswer => {
                const selectedValue = selectedAnswer.value;
                const correctAnswer = question.Answers.find(answer => answer.text === selectedValue);
                if (correctAnswer && correctAnswer.isTrue) {
                    correctAnswers++;
                }
            });
        });
        alert(`Số câu bạn đã trả lời đúng là: ${correctAnswers} trong tổng số ${totalQuestions} câu.`);
    });
    
}
const submitButton = document.getElementById('submit-button');
submitButton.addEventListener('click', submitAnswers);
