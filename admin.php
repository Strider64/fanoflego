<?php

require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Login;
use FanOfLEGO\CMS;
use FanOfLEGO\Pagination_New as Pagination;

$user = new Login();
if (Login::adminCheck()) {
    $_SESSION['securityLevel'] = 'admin';
}
$_SESSION['loggedIn'] = Login::memberCheck();

if (!$user::adminCheck()) {
    header('Location: index.php');
    exit();
}

/*
 * Using pagination in order to have a nice looking
 * website page.
 */

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $current_page = urldecode($_GET['page']);
} else {
    $current_page = 1;
}

$per_page = 12; // Total number of records to be displayed:
$total_count = CMS::totalCount(); // Total Records in the db table:


/* Send the 3 variables to the Pagination class to be processed */
$pagination = new Pagination($current_page, $per_page, $total_count);


/* Grab the offset (page) location from using the offset method */
$offset = $pagination->offset();
//echo "<pre>" . print_r($offset, 1) . "</pre>";
//die();
/*
 * Grab the data from the CMS class method *static*
 * and put the data into an array variable.
 */
$cms = CMS::allPages($per_page, $offset);
//echo "<pre>" . print_r($cms, 1) . "</pre>";
//die();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" media="all" href="assets/css/admin.css">
</head>
<body class="site">
<header class="headerStyle">

</header>
<?php include_once 'assets/includes/inc.trivia.nav.php'; ?>
<section class="main">

    <?php
    foreach ($cms as $record) {

        echo '<header class="sectionHeader">';
        echo '<h2 class="sectionHeadingText">' . $record['heading'] . '</h2>';
        echo '</header>';
        echo '<article class="sectionArticle">';
        echo '<img class="imageArticle right-side" src="' . $record['image_path'] . '" alt="LEGO Bookstore">';
        echo '<p class="articleText">' . nl2br($record['content']) . '</p>';
        echo ' </article>';
        echo '<footer class="sectionFooter">';
        echo '<p class="sectionText">Written by ' . $record['author'] . ' on ' . CMS::styleDate($record['date_added']) . ' </p>';
        echo '<a class="editButton"
                   href="edit.php?id=' . urldecode($record['id']) . '">Record ' . urldecode($record['id']) . '</a>';
        echo '</footer>';
    }
    ?>

</section>
<?php include_once "assets/includes/inc.sidebar.php" ?>
<?php include_once 'assets/includes/inc.footer.php'; ?>
</body>
</html>
