<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/createStyle.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="https://media.discordapp.net/attachments/776385006377107487/802161247540871218/brain.png?width=461&height=461"/>
  <script src="../js/create.js"></script>
  <title>Genius.me</title>
</head>
<body>
  <form action="/save" method="POST" autocomplete="off">
    @csrf
    <div class="header">
      <img src="img/genius.me-logo.png" alt="" class=logo onclick="logout()">
      <input type="text" class="quizTitle-input" placeholder="Enter quiz title" name="title">
      <button class="save-btn" type="submit">Save</button>
    </div>
    <div class="main-content">
      <div class="quiz-preview">
        <div class="quiz-title">Quiz Preview</div>
        <textarea type="text" class="preview-input" placeholder="Let's educate the students ..." name="preview" required></textarea>
      </div>
      <div class="question" id="question1">
        <div class="question-number">Question 1</div>
        <input class="question-input" placeholder="Type your question" name="question1" required>
        <div class="question-choices-container">
          <input placeholder="Add Answer" style="background-color: #6BD863;" name="choice1_1" required>
          <input placeholder="Add Answer" style="background-color: #FFFF00;" name="choice1_2" required>
          <input placeholder="Add Answer" style="background-color: #8394FF;" name="choice1_3" >
          <input placeholder="Add Answer" style="background-color: #cd84f1;" name="choice1_4" >
        </div>
          <input type="radio" class= "radio" id="radio-1" name="answer1" value="1" required>
          <input type="radio" class= "radio" id="radio-2" name="answer1" value="2">
          <input type="radio" class= "radio" id="radio-3" name="answer1" value="3">
          <input type="radio" class= "radio" id="radio-4" name="answer1" value="4">
      </div>
    </div>    
  </form>
  <button class="add-question" onclick="addQuestion()">+</button>
</body>
</html>