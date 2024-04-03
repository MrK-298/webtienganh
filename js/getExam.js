window.onload = async function() {
    fetch('http://localhost:8084/webtienganh/api/exam/getExam.php')
    .then(response => response.json())
    .then(data => {
      console.log(data);
      const questionListDiv = document.getElementById('question-list');
      const listitem = document.createElement('ul');
      let count = 1;
      //part5
      const part5Questions = data.Questions.filter(question => question.type === "Part 5");
      part5Questions.forEach((question, index) => {
          const questionDiv = document.createElement('div');
          const questionId = `${index + 1}`;
          questionDiv.id = `${questionId}`;
          questionDiv.classList.add('question');
          questionDiv.innerHTML = `
              <p>${count}. ${question.questionText}</p>
              <div class="options">
              ${question.Answers.map(answer => `
                  <label><input type="radio" name="question${questionId}" id="${questionId}" value="${answer.text}">${answer.text}</label>
              `).join('')}
          </div>
          `;  
          //sự kiện button
          const subQuestionLi = document.createElement('li'); 
          const questionButton = document.createElement('button');
          questionButton.setAttribute("id",questionId)
          questionButton.textContent = count++;
          questionButton.addEventListener('click', () => {
              const subQuestionElement = document.getElementById(questionId);
              subQuestionElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
          });
          subQuestionLi.appendChild(questionButton)
          listitem.appendChild(subQuestionLi);     
          document.getElementById('quiz-container').appendChild(questionDiv);
      });
      questionListDiv.appendChild(listitem);
      //part 7
      const part7Questions = data.Questions.filter(question => question.type === "Part 7");
      part7Questions.forEach((question, index) => {
          const questionDiv = document.createElement('div');
          questionDiv.id = `Question${index + 1}`;
          questionDiv.classList.add('question');
          questionDiv.innerHTML = `
              <p>${question.questionText}</p>
              <div class="image-container">
                  <img src="${question.imageUrl}">  
              </div>
          `;
          question.SubQuestions.forEach((subQuestion, subIndex) => {                
              const subQuestionId = `${index + 1}_${subIndex + 1}`;                          
              const subQuestionDiv = document.createElement('div');
              subQuestionDiv.classList.add('sub-question');
              subQuestionDiv.innerHTML = `
                  <p>${subQuestion.text}</p>
                  <div class="options">
                      ${subQuestion.Answers.map(answer => `
                          <label><input type="radio" name="question${subQuestionId}" id="${subQuestionId}" value="${answer.text}">${answer.text}</label>
                      `).join('')}
                  </div>
              `;
              //sự kiện button
              const subQuestionLi = document.createElement('li'); 
              const subQuestionButton = document.createElement('button');
              subQuestionButton.setAttribute("id",subQuestionId);
              subQuestionButton.textContent = count++;
              subQuestionButton.addEventListener('click', () => {
                  const subQuestionElement = document.getElementById(subQuestionId);
                  subQuestionElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
              });
              subQuestionLi.appendChild(subQuestionButton)
              listitem.appendChild(subQuestionLi);
              questionDiv.appendChild(subQuestionDiv);               
          });      
          document.getElementById('quiz-container').appendChild(questionDiv);
      });           
      questionListDiv.appendChild(listitem);
      const inputElements = document.querySelectorAll('#quiz-container input[type="radio"]');
      inputElements.forEach(input => {
          input.addEventListener('change', () => {
              const subQuestionId = input.getAttribute("id");
              const button = document.querySelector(`#question-list button[id="${subQuestionId}"]`);
              if (button) {
                  button.setAttribute("style","background-color:aqua");
              }
          });
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
};
