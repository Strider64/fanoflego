<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Trivia;

/*
 * The below must be used in order for the json to be decoded properly.
 */
try {
    $data = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
    $result = TRIVIA::fetch_correct_answer($data['id']);
    output($result);
} catch (JsonException $e) {
}

/*
 * After converting data array to JSON send back to javascript using
 * this function.
 */

function output($output)
{
    http_response_code(200);
    try {
        echo json_encode($output, JSON_THROW_ON_ERROR);
    } catch (JsonException) {
    }
}

