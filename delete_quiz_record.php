<?php
require_once "assets/config/config.php";
require_once "vendor/autoload.php";

use FanOfLEGO\TriviaDatabaseOBJ;
use FanOfLEGO\Login;

$user = new Login();
if (Login::adminCheck()) {
    $_SESSION['securityLevel'] = 'admin';
}
if (!$user::adminCheck()) {
    header('Location: index.php');
    exit();
}

$delete = new TriviaDatabaseOBJ();

$id = $_GET['id'] ?? null;

if (!empty($id)) {
    $data = TriviaDatabaseOBJ::fetch_by_id($id);

    /*
     * Delete the record from the Database Table
     */
    $delete->delete($id);
    /*
     * Redirect to the Administrator's Home page
     */
    header("Location: modifyTrivia.php");
    exit();
}

header("Location: modifyTrivia.php");
exit();
