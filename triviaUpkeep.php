<?php

require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Trivia;
use FanOfLEGO\Login;
$user = new Login();
if (Login::adminCheck()) {
    $_SESSION['securityLevel'] = 'admin';
}
if (!$user::adminCheck()) {
    header('Location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Trivia Maintenance</title>
    <link rel="stylesheet" media="all" href="assets/css/styles.css">
</head>
<body class="site">
<header class="headerStyle">

</header>
<?php include_once 'assets/includes/inc.trivia.nav.php'; ?>
<section class="main">
</section>
<aside class="sidebar">
</aside>
<?php include_once 'assets/includes/inc.footer.php'; ?>

</body>
</html>
