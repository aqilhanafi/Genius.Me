var i = 2;

function logout() {
  if (confirm("Are you sure to log out?")) {
    window.open('/logout', '_self');
  }
  return 0;
}

function addQuestion() {
  //create div class of question
  var question = document.createElement('div');
  question.setAttribute("class", "question");

  //place the question number inside html
  var questionNum = document.createElement('div');
  questionNum.setAttribute("class", "question-number");
  questionNum.innerHTML = 'Question ' + i;

  //place the input inside the html
  var questionInput = document.createElement('input');
  questionInput.setAttribute('class', 'question-input');
  questionInput.setAttribute('placeholder', 'Type your question');
  questionInput.setAttribute('name', 'question' + i);
  questionInput.required = true;

  //container for choices
  var questionChoiceContainer = document.createElement('div');
  questionChoiceContainer.setAttribute('class', 'question-choices-container');

  //choice1
  var choice1 = document.createElement('input');
  choice1.setAttribute('placeholder', 'Add Answer');
  choice1.style.backgroundColor = "#6BD863";
  choice1.setAttribute('name', 'choice' + i + '_1');
  questionChoiceContainer.appendChild(choice1);
  //choice2
  var choice2 = document.createElement('input');
  choice2.setAttribute('placeholder', 'Add Answer');
  choice2.style.backgroundColor = "#FFFF00";
  choice2.setAttribute('name', 'choice' + i + '_2');
  questionChoiceContainer.appendChild(choice2);

  //choice3
  var choice3 = document.createElement('input');
  choice3.setAttribute('placeholder', 'Add Answer');
  choice3.style.backgroundColor = "#8394FF";
  choice3.setAttribute('name', 'choice' + i + '_3');
  questionChoiceContainer.appendChild(choice3);
  
  //choice4
  var choice4 = document.createElement('input');
  choice4.setAttribute('placeholder', 'Add Answer');
  choice4.style.backgroundColor = "#cd84f1";
  choice4.setAttribute('name', 'choice' + i + '_4');
  questionChoiceContainer.appendChild(choice4);

  //add radio button for chosen answer
  //answer 1
  var answer1 = document.createElement('input');
  answer1.required = true;
  answer1.setAttribute('type', 'radio');
  answer1.setAttribute('class', 'radio');
  answer1.setAttribute('id', 'radio-1');
  answer1.setAttribute('value', '1');
  answer1.setAttribute('name', 'answer' + i);

  //answer 2
  var answer2 = document.createElement('input');
  answer2.setAttribute('type', 'radio');
  answer2.setAttribute('class', 'radio');
  answer2.setAttribute('id', 'radio-2');
  answer2.setAttribute('value', '2');
  answer2.setAttribute('name', 'answer' + i);

  //answer 3
  var answer3 = document.createElement('input');
  answer3.setAttribute('type', 'radio');
  answer3.setAttribute('class', 'radio');
  answer3.setAttribute('id', 'radio-3');
  answer1.setAttribute('value', '3');
  answer3.setAttribute('name', 'answer' + i);

  //answer 4
  var answer4 = document.createElement('input');
  answer4.setAttribute('type', 'radio');
  answer4.setAttribute('class', 'radio');
  answer4.setAttribute('id', 'radio-4');
  answer4.setAttribute('value', '4');
  answer4.setAttribute('name', 'answer' + i);
  

  //add all choices inside question
  question.appendChild(questionNum);
  question.appendChild(questionInput);
  question.appendChild(questionChoiceContainer);
  question.appendChild(answer1);
  question.appendChild(answer2);
  question.appendChild(answer3);
  question.appendChild(answer4);


  document.querySelector('.main-content').appendChild(question);
  i++;
  //smooth scroll
  window.scrollTo({
    top: 100000,
    behavior: 'smooth'
  });
}


function validateAnswer() {
  
}