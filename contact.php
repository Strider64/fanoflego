<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Login;

$_SESSION['loggedIn'] = false;
$login = new Login();

if ($login::memberCheck()) {
    header("Location: members.php");
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
    <title>Contact Page</title>
    <link rel="stylesheet" media="all" href="assets/css/styles.css">

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
        <form class="modal-content animate" method="post">
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
                <span class="psw">Please <a href="register.php">Register</a></span>
            </div>
        </form>

</header>
</header>
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<section class="main">
    <div class="main_container">
        <div class="home_article">
            <form class="contact" name="contact" action="contact.php" method="post" autocomplete="on">

                <input id="token" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                <input type="hidden" name="reason" value="message">
                <figure class="owner">
                    <img src="assets/images/img-john-pepp-150-150-001.jpg" alt="John Pepp" width="150" height="150">
                    <figcaption>John Pepp</figcaption>
                </figure>
                <hr class="horizontal_line">
                <div class="contact_name">
                    <label class="labelstyle" for="name" accesskey="U">Contact Name</label>
                    <input name="name" type="text" id="name" tabindex="1" placeholder="Full Name" autofocus
                           required="required"/>
                </div>

                <div class="contact_email">
                    <label class="labelstyle" for="email" accesskey="E">Email</label>
                    <input name="email" type="email" id="email" placeholder="Email" tabindex="2" required="required"/>
                </div>

                <div class="contact_phone">
                    <label class="labelstyle" for="phone" accesskey="P">Phone <small>(optional)</small></label>
                    <input name="phone" type="tel" id="phone" tabindex="3">
                </div>

                <div class="contact_website">
                    <label class="labelstyle" for="web" accesskey="W">Website <small>(optional)</small></label>
                    <input name="website" type="text" id="web" tabindex="4">
                </div>


                <div class="contact_comment">
                    <label class="textareaLabel" for="comments">Comments Length:<span id="length"></span></label>
                    <textarea name="comments" id="comments" spellcheck="true" placeholder="Your Message" tabindex="6"
                              required="required"></textarea>
                </div>

                <div id="recaptcha" class="g-recaptcha" data-sitekey="6Le0QrobAAAAAGDacgiAr1UbkPmj0i-LFyWXocfg"
                     data-callback="correctCaptcha"></div>

                <div id="message">
                    <img class="notice" src="assets/images/email.png" alt="email icon">
                    <img class="pen" src="assets/images/fountain-pen-close-up.png" alt="fountain pen">
                </div>

                <button id="submitForm" class="submit_comment" type="submit" name="submit" value="Submit" tabindex="7"
                        data-response="">Submit
                </button>
                <!-- Use a data callback function that Google provides -->
            </form>
        </div>
        <div class="home_sidebar">

        </div>
    </div>
</section>
<aside class="sidebar">
    <p>Help support Fan of LEGO Website development and it is only $10.00 per year. I know what you are thinking that
        $10.00 per year that there must be some kind of catch? Well, there isn't as that $10.00 tells me that people are
        interested in seeing this website get better and my ony goal is to make people happy by sharing the happiness
        that LEGO brings.</p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick-subscriptions">
        <input type="hidden" name="business" value="jrpepp@pepster.com">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="item_name" value="Support FanOfLEGO Development">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="src" value="1">
        <input type="hidden" name="a3" value="10.00">
        <input type="hidden" name="p3" value="1">
        <input type="hidden" name="t3" value="Y">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0"
               name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

    <script src="https://app.enzuzo.com/apps/enzuzo/static/js/__enzuzo-cookiebar.js?uuid=3acfe1a8-a441-11ed-92bc-0fcd369b1deb"></script>


</aside>
<?php include_once 'assets/includes/inc.footer.php'; ?>
<script src="assets/js/contact.js" async defer></script>
<!-- Fetch the g-response using a callback function -->
<script>
    function correctCaptcha(response) {
        document.querySelector('#submitForm').setAttribute('data-response', response);
    }
</script>


</body>
</html>
