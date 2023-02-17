<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Successful Registration</title>
    <link rel="stylesheet" media="all" href="assets/css/styles.css">
</head>
<body class="site">
<header class="headerStyle">
</header>
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<section class="main">
    <header class="sectionHeader">
        <h2 class="sectionHeadingText">Thank You for Registering!</h2>
    </header>
    <article class="sectionArticle">
        <img class="imageArticle right-side" src="assets/uploads/img-gallery-1675103440-2048x1365.jpg" alt="LEGO Pictures">
        <p class="articleText">There was an email sent to your email address (<b>check your junk mail if you didn't receive it</b>) that you need to activate your account in order to be granted full privileges. Please check you junk or spam folder if you haven't received it. I look forward in you visiting the Fan of LEGO website.</p>
    </article>
</section>
<?php include_once "assets/includes/inc.sidebar.php" ?>
<?php include_once 'assets/includes/inc.footer.php'; ?>

</body>
</html>
