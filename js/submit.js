async function submitAnswers() {
    let correctAnswers = 0;
    const response = await fetch('http://localhost:3000/api/v1/exams/');
    if (!response.ok) {
        throw new Error('Không thể lấy dữ liệu từ API');
    }
    console.log('API thành công');
    const examData = await response.json();
    examData.Questions.forEach((question, index) => {
        question.SubQuestions.forEach((subQuestion, subIndex) => {
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
    let totalSubQuestions = examData.Questions.reduce((acc, question) => {
        return acc + question.SubQuestions.length;
    }, 0);   
    alert(`Số câu trả lời đúng: ${correctAnswers}/${totalSubQuestions}`);
}
const submitButton = document.getElementById('submit-button');
submitButton.addEventListener('click', submitAnswers);
