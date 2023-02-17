<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\CMS;
use FanOfLEGO\Pagination_New as Pagination;
use FanOfLEGO\Login;
try {
    $today = new DateTime("Now", new DateTimeZone("America/Detroit"));
} catch (Exception $e) {
}
if (isset($_SESSION['id'])) {
    $username = Login::username();
} else {
    $username = "Guest Player";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Trivia Game</title>
    <link rel="stylesheet" media="all" href="assets/css/game.css">
    <script src="assets/js/game.js" defer></script>
</head>
<body class="site">
<header class="headerStyle">
    <!-- Button to open the modal login form -->
    <button id="myButton" onclick="document.getElementById('id01').style.display='block'">Login</button>

    <!-- The Modal -->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
              title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="/index.php" method="post">
            <div class="imgcontainer">
                <img src="assets/images/img-john-pepp-150-150-001.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="user[username]" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="user[hashed_password]" required>

                <button id="myButton" type="submit" name="submit" value="login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="user[remember]"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel
                </button>
                <span class="psw">Please <a href="register.php">Register</a></span>
            </div>
        </form>
</header>
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<main id="content" class="checkStyle">

    <div class="addTriviaInfo">
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
        </table>
    </div>

    <div id="quiz" class="displayMessage" data-username="<?= $username ?>">
        <div class="triviaContainer" data-records=" ">
            <div id="mainGame">
                <div id="current">Question No. <span id="currentQuestion"></span></div>
                <div id="triviaSection" data-correct="">
                    <div id="questionBox">
                        <h2 id="question">What is the Question?</h2>
                    </div>
                    <div id="buttonContainer"></div>
                </div>

                <div id="headerStyle" data-user="">
                    <button id="next" class="nextBtn">Next</button>
                    <div class="gauge">
                        <div class="gauge__body">
                            <div class="gauge__fill"></div>
                            <div class="gauge__cover">Power 100%</div>
                        </div>
                    </div>
                    <p id="score">0 Points</p>
                    <p id="percent">100% Correct</p>


                </div>

            </div>
        </div>
    </div>
    <div id="finalResult">
        <h2>Game Over!</h2>
        <p><?= $username ?> ended up with <span class="totalScore"></span> points and answered <span
                class="answeredRight"></span> right.</p>
        <a class="btn1" href="game.php" title="Quiz">Play Again?</a>
    </div>
</main>
<aside class="sidebar">



    <div class="displayStatus select-css">
        <div id="startBtn">
            <form id="game_category" action="game.php" method="post">
                <label style="color: #2E2E2E" class="form-control">
                    <input type="radio" name="category" value="lego" checked>
                    LEGO
                </label>

                <label style="color: #2E2E2E" class="form-control">
                    <input type="radio" name="category" value="photography">
                    Photography
                </label>

                <label style="color: #2E2E2E" class="form-control">
                    <input type="radio" name="category" value="movie">
                    Movie
                </label>

                <label style="color: #2E2E2E" class="form-control">
                    <input type="radio" name="category" value="sports">
                    Sports
                </label>

                <label style="color: #2E2E2E" class="form-control">
                    <input type="radio" name="category" value="space">
                    Space
                </label>
                <p class="show">
                    <button id="btn" class="button">Select Game Category</button>
                </p>
            </form>
        </div>
        <span id="clock"></span>
        <h4 class="displayTitle">The Coolest LEGO Trivia</h4>
        <p class="triviaInfo">This trivia game I have been developing for over 10 years and I first wrote the game in Adobe Flash when I was taking a college course in computer graphics design. I plan on add LEGO questions as well as adding images to the quiz to bring more pizzazz to the online trivia game. </p>
        <p>Some features I will be adding back to the game will be the ability for members to add questions to the online quiz this will enable a broader range of questions.</p>
        <p>Only members will be allowed to add questions as I want to keep tight control of what is put into the database table. I will still have to approve the question(s) and before I do the question(s) will be hidden.</p>

    </div>



</aside>
<?php include_once 'assets/includes/inc.footer.php'; ?>
<script>
    const gaugeElement = document.querySelector(".gauge");

    function setGaugeValue(gauge, value) {
        if (value < 0 || value > 1) {
            return;
        }

        gauge.querySelector(".gauge__fill").style.transform = `rotate(${
            value / 2
        }turn)`;
        gauge.querySelector(".gauge__cover").textContent = `Power ${Math.round(
            value * 100
        )}%`;
    }


</script>
</body>
</html>
