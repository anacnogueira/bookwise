<?php

$uri = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'])['path']);

$controller = !empty($uri) ? $uri : 'index';

$path = "controllers/{$controller}.controller.php";

if (!file_exists($path)) {
    abort(404);
}
require "controllers/{$controller}.controller.php";
