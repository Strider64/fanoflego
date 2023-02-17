<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";
use FanOfLEGO\Register;
use FanOfLEGO\sendMail;
use FanOfLEGO\Login;

$user = new Login();

if ($user::memberCheck()) {
    header("Location: members.php");
    exit();
}
try {
    $today = $todayDate = new DateTime('today', new DateTimeZone("America/Detroit"));
} catch (Exception $e) {
}


if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['submit'])) {

    $send = new sendMail();
    $data = [];

    $data['name'] = trim($_POST['user']['first_name'] . ' ' . $_POST['user']['last_name']);
    $data['validation'] = $send->validationFCN(20);
    $_POST['user']['validation'] = $data['validation'];

    $data['email'] = $_POST['user']['email'];
    $data['phone'] = $_POST['user']['phone'];
    $data['birthday'] = $_POST['user']['birthday'];

    $data['message'] =
        '<html lang="en">' .
        '<body style=\'background: #eee;\'>' .
        '<p style="font-size: 1.8em; line-height: 1.5;">Full Name : ' . $data['name'] .
        '<br>Email Address : ' . $data['email'] .
        '<br>Phone : ' . $data['phone'] .
        '<br>Birthday : ' . $data['birthday'] . '</p>' .
        '<p style="font-size: 1.4em; line-height: 1.5;">Please click on link: https://www.fanoflego.com/activate.php?confirmation=' . $data['validation'] . ' in order to have access to Fan of LEGO Website.</p>' .
        '<p style="font-size: 1.4em; line-height: 1.5;">In addition please answer the question "LEGO comes from what country?</p>' .
        '</body>' .
        '</html>';



    $register = new Register($_POST['user']);
    $result = $register->create();
    if ($result) {
        $send->verificationEmail($data);
        header("Location: success.php");
        exit();
    }

    header("Location: members.php");
    exit();
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" media="all" href="assets/css/styles.css">
</head>
<body class="site">
<header class="headerStyle">

</header>
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<section class="main">
    <form class="registerStyle" action="register.php" method="post">
        <input type="hidden" typeof="text" name="user[new_date] value="<?= $today->format("Y-m-d H:i:s") ?>">
        <div class="first">
            <label for="first_name">First Name</label>
            <input id="first_name" type="text" name="user[first_name]" value="" tabindex="2" required>
        </div>

        <div class="last">
            <label for="last_name">Last Name</label>
            <input id="last_name" type="text" name="user[last_name]" value="" tabindex="3" required>
        </div>

        <div class="screenName">
            <label class="text_username" for="username">Username <span class="error"> is unavailable!</span> </label>
            <input id="username" class="io_username" type="text" name="user[username]" value="" tabindex="4" required>
        </div>

        <div class="telephone">
            <label for="phone">Phone (Optional)</label>
            <input id="phone" type="tel" name="user[phone]" value="" placeholder="555-555-5555"
                   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" tabindex="5">

        </div>

        <div class="emailStyle">
            <label class="emailLabel" for="email">Email <span class="emailError"> is invalid</span> </label>
            <input id="email" type="email" name="user[email]" value="" tabindex="1" autofocus required>
        </div>

        <div class="password1">
            <label for="passwordBox">Password</label>
            <input class="passwordBox1" id="passwordBox" type="password" name="user[hashed_password]" value=""
                   tabindex="6" required>
        </div>


        <div class="password2">
            <label for="redoPassword">ReEnter Password</label>
            <input class="passwordBox2" id="redoPassword" type="password" name="user[redo]" value="" tabindex="8"
                   required>
        </div>


        <label class="labelShow" for="passwordVisibility">Show Passwords (private computer)</label>
        <input class="passwordBtn1" id="passwordVisibility" type="checkbox" tabindex="7">

        <div class="birthday">
            <label for="birthday">Birthday (optional)</label>
            <input id="birthday" type="date" name="user[birthday]" value="1970-01-01" tabindex="9">
        </div>


        <div class="submitForm">
            <button class="submitBtn" id="submitForm" type="submit" name="submit" value="enter" tabindex="10">Submit
            </button>
        </div>


    </form>
</section>
<?php include_once "assets/includes/inc.sidebar.php" ?>
<?php include_once 'assets/includes/inc.footer.php'; ?>
<script>
    function passwordVisibility() {

        let passwordBox1 = document.querySelector(".passwordBox1");
        let passwordBox2 = document.querySelector(".passwordBox2");
        const fields = [passwordBox1, passwordBox2];
        fields.forEach(x => {
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        });
    }

    document.querySelector(".passwordBtn1").addEventListener('click', passwordVisibility, false);

</script>
<script src="/assets/js/validation.js"></script>
</body>
</html>
