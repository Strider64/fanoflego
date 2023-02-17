<?php
ob_start(); // turn on output buffering
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
// **PREVENTING SESSION HIJACKING**

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


session_start();
if (empty($_SESSION['token'])) {
    try {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
    }
}
$server_name = filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_URL);
define('BASE_PATH', realpath(__DIR__));



//define('DATABASE_HOST', 'localhost');
//define('DATABASE_NAME', 'miniature');
//define('DATABASE_USERNAME', 'admin');
//define('DATABASE_PASSWORD', 'Dpsimfm1964!');
//define('DATABASE_TABLE', 'cms');

const EMAIL_PASSWORD = 'Dpsimfm1964@1927!';
const G_PASSWORD = 'Dpsimfm1964@57';
const PRIVATE_KEY = '6Le0QrobAAAAALXWgLtnDgcrtObMf0KPLTVaF2cI';
const DATABASE_HOST = 'db5001598977.hosting-data.io';
const DATABASE_NAME = 'dbs1330908';
const DATABASE_USERNAME = 'dbu1252370';
const DATABASE_PASSWORD = 'Dtmmtil1928!2017A';
const DATABASE_TABLE = 'admin';
const IMAGE_WIDTH = 800;
const IMAGE_HEIGHT = 534;


header("Content-Type: text/html; charset=utf-8");
header('X-Frame-Options: SAMEORIGIN'); // Prevent Clickjacking:
header('X-Content-Type-Options: nosniff');
header('x-xss-protection: 1; mode=block');
header('Strict-Transport-General: max-age=31536000; includeSubDomains');
//header("content-security-policy: default-src 'self'; report-uri /csp_report_parser");
header('X-Permitted-Cross-Domain-Policies: master-only');

/* Get the current page */
$phpSelf = $_SERVER['PHP_SELF'];
$path_parts = pathinfo($phpSelf);
$basename = $path_parts['basename']; // Use this variable for action='':
$pageName = $path_parts['filename'];