<?php

require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\TriviaDatabaseOBJ;
use FanOfLEGO\Login;
$user = new Login();
if (Login::adminCheck()) {
    $_SESSION['securityLevel'] = 'admin';
}
if (!login::memberCheck()) {
    header('Location: register.php');
    exit();
} else {
    $_SESSION['loggedIn'] = true;
}

if (isset($_POST['submit'])) {
    $quiz = $_POST['quiz'];
    //echo "<pre>" .print_r($quiz, 1) . "</pre>";
    //die();
    $trivia = new TriviaDatabaseOBJ($quiz);
    $result = $trivia->create();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>New Questions</title>
    <link rel="stylesheet" media="all" href="assets/css/game.css">
</head>
<body class="site">
<header class="headerStyle">

</header>
<?php include_once 'assets/includes/inc.trivia.nav.php'; ?>
<section class="main">
    <form id="addTrivia" class="checkStyle"  method="post">
        <input type="hidden" name="quiz[user_id]" value="<?= $_SESSION['id'] ?>">
        <input type="hidden" name="quiz[token]" value="<?= $_SESSION['token'] ?>">

        <div class="select-hidden">
            <?php
            if ($_SESSION['securityLevel'] === 'admin') {
                echo '<select class="select-css" name="quiz[hidden]" tabindex="1">';
                echo '<option value="yes">Hide Question: Yes</option>';
                echo '<option value="no" selected>Hide Question: No</option>';
                echo'</select>';
            } else {
                echo '<input type="hidden" name="quiz[hidden]" value="yes">';
                echo '<div class="messageNew">';
                echo "<p>New Questions will need to be approved before becoming public.</p>";
                echo '</div>';
            }
            ?>

        </div>
        <div class="select-category">
            <select id="category" class="select-css" name="quiz[category]" tabindex="2">
                <option value="lego">LEGO</option>
                <option value="photography">Photography</option>
                <option value="movie">Movie</option>
                <option value="space">Space</option>
                <option value="sport">Sports</option>
            </select>
        </div>

        <div class="question">
            <label class="question_label" for="content">Question</label>
            <textarea class="question_input" id="content" name="quiz[question]" tabindex="3"
                      placeholder="Add question here..."
                      autofocus></textarea>
        </div>
        <div class="answer1">
            <label class="answer_one_label answerStyle" for="addAnswer1">Answer 1</label>
            <input class="answer_one_input" id="addAnswer1" type="text" name="quiz[ans1]" value="" tabindex="4">
        </div>
        <div class="answer2">
            <label class="answer_two_label answerStyle" for="addAnswer2">Answer 2</label>
            <input class="answer_two_input" id="addAnswer2" type="text" name="quiz[ans2]" value="" tabindex="5">
        </div>

        <div class="answer3">
            <label class="answer_three_label answerStyle" for="addAnswer3">Answer 3</label>
            <input class="answer_three_input" id="addAnswer3" type="text" name="quiz[ans3]" value="" tabindex="6">
        </div>

        <div class="answer4">
            <label class="answer_four_label answerStyle" for="addAnswer4">Answer 4</label>
            <input class="answer_four_input" id="addAnswer4" type="text" name="quiz[ans4]" value="" tabindex="7">
        </div>

        <div class="correct">
            <label class="correct_answer_label" for="addCorrect">Correct Answer</label>
            <input class="correct_answer_input" id="addCorrect" type="text" name="quiz[correct]" value="" tabindex="8">
        </div>


        <div class="submit-button">
            <button class="form-button" type="submit" name="submit" value="enter" tabindex="9">submit</button>
        </div>
    </form>
</section>

<?php include_once "assets/includes/inc.sidebar.php" ?>
<?php include_once 'assets/includes/inc.footer.php'; ?>
</body>
</html>
