<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\TriviaDatabaseOBJ;


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
        .buttonStyle {
            display: block;
            width: 100%;
            height: 3.125em;
            border: none;
            outline: none;
            cursor: pointer;
            background-color: #F5F5F5;
            font-family: 'Rubik', sans-serif;
            font-size: 1.2em;
            color: #2E2E2E;
            text-transform: capitalize;
            text-align: left;
            padding-left: 0.625em;
            margin: 0.625em auto;
        }
        .buttonStyle:hover {
            background-color: #00b28d;
            color: #fff;
        }
        #next {
            float: right;
            outline: none;
            color: #fff;
            border: none;
            background-color: #4CAF50;
            box-shadow: 2px 2px 1px rgba(0, 0, 0, 0.5);
            width: 6.25em;
            font-family: 'Rubik', sans-serif;
            font-size: 1.2em;
            text-transform: capitalize;
            text-decoration: none;
            padding: 0.313em;
            margin: 0.625em 0;
            transition: background-color .5s;
        }
        #next:hover {
            background-color: #2e6b31;
        }

    </style>
</head>
<body class="site">
<header class="headerStyle">
</header>
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<main id="content" class="main">
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

                <div id="headerStyle" data-user="">
                    <button id="next" class="nextBtn">Next</button>

                    <p id="score">Points: 0</p>
                    <p id="percent">100% Correct</p>


                </div>

            </div>
        </div>
    </div>
</main>
<aside class="sidebar">
</aside>
<?php include_once 'assets/includes/inc.footer.php'; ?>
<script src="assets/js/trivia.js"></script>

<script>


</script>
<!--<script src="assets/js/fetchTriviaApi.js"></script>-->
</body>
</html>
