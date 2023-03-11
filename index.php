<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\CMS;
use FanOfLEGO\Pagination_New as Pagination;
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


/*
 * Using pagination in order to have a nice looking
 * website page.
 */

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $current_page = urldecode($_GET['page']);
} else {
    $current_page = 1;
}

$per_page = 1; // Total number of records to be displayed:
$total_count = CMS::countAllPage('index'); // Total Records in the db table:


/* Send the 3 variables to the Pagination class to be processed */
$pagination = new Pagination($current_page, $per_page, $total_count);


/* Grab the offset (page) location from using the offset method */
$offset = $pagination->offset();

/*
 * Grab the data from the CMS class method *static*
 * and put the data into an array variable.
 */
$cms = CMS::page($per_page, $offset);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Fan of LEGO</title>
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
        <form class="modal-content animate"  method="post">
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
<?php include_once 'assets/includes/inc.navigation.php'; ?>
<section class="main">
    <?php
    foreach ($cms as $record) {

        echo '<header class="sectionHeader">';
        echo '<h2 class="sectionHeadingText">'. $record['heading'] . '</h2>';
        echo '</header>';
        echo '<article class="sectionArticle">';
        echo '<img class="imageArticle right-side" src="' . $record['image_path'] . '" alt="LEGO Bookstore">';
        echo '<p class="articleText">' . nl2br($record['content']). '</p>';
        echo ' </article>';
        echo '<footer class="sectionFooter">';
        echo '<p class="sectionText">Written by ' . $record['author'] . ' on ' . CMS::styleDate($record['date_added']) .' </p>';
        echo '</footer>';
    }
    ?>

    <div class="flex_container">
        <?= $pagination->links(); ?>
    </div>

</section>
<aside class="sidebar">
    <p>Help support Fan of LEGO Website development and it is only $10.00 per year. I know what you are thinking that $10.00 per year that there must be some kind of catch? Well, there isn't as that $10.00 tells me that people are interested in seeing this website get better and my ony goal is to make people happy by sharing the happiness that LEGO brings.</p>
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
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

    <script src="https://app.enzuzo.com/apps/enzuzo/static/js/__enzuzo-cookiebar.js?uuid=3acfe1a8-a441-11ed-92bc-0fcd369b1deb"></script>



</aside>
<?php include_once 'assets/includes/inc.footer.php'; ?>
<script>

    // JavaScript code for modal/help window
    document.addEventListener('keyup', function (event) {
       let element = document.getElementById('myButton');
       if (event.ctrlKey && event.key == 'o') {
           element.style.display = 'block';
       }
    });

</script>

</body>
</html>
