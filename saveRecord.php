<?php

require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Login;
use FanOfLEGO\Trivia;

$user = new Login();
if (Login::adminCheck()) {
    $_SESSION['securityLevel'] = 'admin';
}
if (!$user::adminCheck()) {
    header('Location: index.php');
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$trivia = new Trivia($data);
$result = $trivia->update();

if ($result) {
    output('Data Successfully Updated');
}

function errorOutput($output, $code = 500)
{
    http_response_code($code);
    echo json_encode($output);
}

function output($output)
{
    http_response_code(200);
    echo json_encode($output);
}
