<?php

require_once 'assets/config/config.php';
require_once "vendor/autoload.php";

use FanOfLEGO\Gallery;
use FanOfLEGO\Pagination_New as Pagination;


$database_data = [];
/*
 * The below must be used in order for the json to be decoded properly.
 */
try {
    $database_data = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
}


/*
 * Grab the data from the CMS class method *static*
 * and put the data into an array variable.
 */
$gallery = Gallery::page((int)$database_data['per_page'], (int)$database_data['offset'], 'gallery', $database_data['category']);
//$cms = CMS::getImages('blog', $database_data['category']);
output($gallery);

function output($output): void
{
    http_response_code(200);
    try {
        echo json_encode($output, JSON_THROW_ON_ERROR);
    } catch (JsonException) {
    }

}

