<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Register;

try {
    $today = new DateTime('today', new DateTimeZone("America/Detroit"));
} catch (Exception $e) {
}
$data['validation'] = $today->format("Y-m-d H:i:s");

if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['confirmation'])) {
    $data['validation'] = htmlspecialchars($_GET['confirmation']);
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['submit'])) {

    $username = $_POST['user']['username'];
    $hashed_password = $_POST['user']['hashed_password'];
    $validation = $_POST['user']['validation'];
    $answer = $_POST['user']['answer'];

    $result = Register::activate($username, $hashed_password, $validation, $answer);

    if ($result) {
        header('Location: message.php');
        exit();
    }


}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Activate</title>
    <link rel="stylesheet" media="all" href="assets/css/styles.css">
</head>
<body class="site">
<header class="headerStyle">

</header>
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<section class="main">
    <form id="activate" class="login" method="post" action="activate.php">
        <input type="hidden" name="user[validation]" value="<?= $data['validation'] ?>">
        <label class="text_username" for="username">Username</label>
        <input id="username" class="io_username" type="text" name="user[username]" value="" required>
        <label class="text_password" for="password">Password</label>
        <input id="password" class="io_password" type="password" name="user[hashed_password]" required>
        <label for="question">What country does LEGO originate from?</label>

        <select id="question" class="select-css" name="user[answer]">
            <option value="Norway" selected>Norway</option>
            <option value="Denmark">Denmark</option>
            <option value="United States">United States</option>
            <option value="Germany">Germany</option>
        </select>

        <button id="submitForm" type="submit" name="submit" value="enter" tabindex="10">Submit</button>
    </form>
</section>
<?php include_once "assets/includes/inc.sidebar.php" ?>
<?php include_once 'assets/includes/inc.footer.php'; ?>

</body>
</html>
