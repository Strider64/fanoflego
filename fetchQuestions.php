<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\TriviaDatabaseOBJ;

$trivia = new TriviaDatabaseOBJ();
$category = htmlspecialchars($_GET['category']);

$data = $trivia::fetchQuestions($category);

//echo "<pre>" . print_r($data, 1) . "</pre>";


output($data);

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