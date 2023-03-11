<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

/*
 * New Improve Trivia Game
 * created by John Pepp
 * on February 17, 2023
 */

use FanOfLEGO\TriviaDatabaseOBJ;
try {
    $today = new DateTime("Now", new DateTimeZone("America/Detroit"));
} catch (Exception $e) {
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Coolest Trivia Around</title>
    <link rel="stylesheet" media="all" href="assets/css/trivia.css">
    <style>

        #headerStyle {
            display:flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 0.625em;
        }
        #timerStyle {
            color: #4CAF50;
        }
        #score {
            color: #4CAF50;
        }
        #percent {
            color: #4CAF50;
        }

    </style>
</head>
<body class="site">
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<main id="content" class="main">
    <div id="openingScreen">
        <img src="assets/images/img-opening-001.jpg" alt="trivia opening graphic">
    </div>
    <div id="quiz" class="displayMessage" data-username="">
        <div class="triviaContainer" data-records=" ">
            <div id="mainGame">
                <div id="current">Current question is <span id="currentQuestion" data-record=""></span></div>
                <div id="triviaSection" data-correct="">
                    <div id="questionBox">
                        <h2 id="question"></h2>
                        <button class="buttonStyle" id="ans1"></button>
                        <button class="buttonStyle" id="ans2"></button>
                        <button class="buttonStyle" id="ans3"></button>
                        <button class="buttonStyle" id="ans4"></button>
                    </div>
                    <div id="buttonContainer"></div>
                </div>
            </div>
            <button id="next" class="nextBtn">Next</button>
        </div>
    </div>
</main>
<aside class="sidebar">
    <nav id="legoNav" class="vertical-nav">
        <h1>Trivia Categories</h1>
        <ul class="disableButtons">
            <li><a class="category" id="lego" href="#">LEGO</a></li>
            <li><a class="category" id="photography" href="#">Photography</a></li>
            <li><a class="category" id="space" href="#">Space</a></li>
            <li><a class="category" id="movie" href="#">Movie</a></li>
            <li><a class="category" id="sport" href="#">Sports</a></li>
        </ul>
    </nav>
    <div id="headerStyle" data-user="">
        <p id="timerStyle">Time Left : <span id="clock">25</span></p>
        <p id="score">Points: 0</p>
        <p id="percent">100% Correct</p>
    </div>
    <table id="scoreboard" class="styled-table">
        <thead>
        <tr class="tableTitle">
            <th colspan="2">High Scores - <?= $today->format("F j, Y") ?></th>
        </tr>
        <tr class="subTitle">
            <th>Name</th>
            <th>Points</th>
        </tr>
        </thead>
        <tbody class="anchor">

        </tbody>
    </table
</aside>
<?php include_once 'assets/includes/inc.footer.php'; ?>
<script src="assets/js/trivia.js"></script>

<script>


</script>
<!--<script src="assets/js/fetchTriviaApi.js"></script>-->
</body>
</html>
