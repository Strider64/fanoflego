<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Login;
use FanOfLEGO\CMS;


$user = new Login();
if (!$user::adminCheck()) {
    header('Location: index.php');
    exit();
}


$delete = new CMS();

$id = $_GET['id'] ?? null;

if (!empty($id)) {
    $data = CMS::fetch_by_id($id);
    /*
     * Delete the images from the directories
     */
    unlink($data['image_path']);
    /*
     * Delete the record from the Database Table
     */
    $delete->delete($id);
    /*
     * Redirect to the Administrator's Home page
     */
    header("Location: admin.php");
    exit();
}

header("Location: admin.php");
exit();