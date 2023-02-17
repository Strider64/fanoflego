<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\TriviaDatabaseOBJ;

$trivia = new TriviaDatabaseOBJ();

$ids = $trivia::retrieveIDs('lego');

//echo "<pre>" . print_r($ids, 1) . "</pre>";

foreach ($ids as $id) {
    foreach ($id as $k => $v) {
        $idArray[] = $v;
    }
}

//echo "<pre>" . print_r($idArray, 1) . "</pre>";
output($idArray);
/*
 * After converting data array to JSON send back to javascript using
 * this function.
 */

function output($output): void
{
    http_response_code(200);
    try {
        echo json_encode($output, JSON_THROW_ON_ERROR);
    } catch (JsonException) {
    }
}



