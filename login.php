<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Login;

if (isset($_SESSION['last_login'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = new Login($_POST['user']);
    $login->login();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" media="all" href="assets/css/styles.css">
</head>
<body class="site">
<header class="headerStyle">

</header>

<?php include 'assets/includes/inc.navigation.php'; ?>

<section class="main">
    <header class="sectionHeader">
        <h2>Login</h2>
    </header>
    <article class="sectionArticle">

        <!-- Button to open the modal login form -->
        <button onclick="document.getElementById('id01').style.display='block'">Login</button>

        <!-- The Modal -->
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="/login.php" method="post">
                <div class="imgcontainer">
                    <img src="assets/images/img-john-pepp-150-150-001.jpg" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="user[username]" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="user[hashed_password]" required>

                    <button type="submit" name="submit" value="login">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="user[remember]"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancel
                    </button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
    </article>
    <footer class="sectionFooter"><p>&copy; <?php echo date("Y") ?> Fan of LEGO</p></footer>
</section>
<aside class="sidebar">
    < sidebar >
</aside>
<footer class="footer">
    < footer >
</footer>
<script>
    // Get the modal
    let modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
