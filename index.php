<?php

require_once __DIR__ . '/src/Controller/TaskController.php';
require_once __DIR__ . '/src/Model/Task.php';

use App\Controller\TaskController;

$controller = new TaskController();
$controller->handleRequests();

$data = $controller->getData();
$status = $controller->getStatus();
$error = $controller->getError();

//URL parser

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$parsedUrl = parse_url($requestUri);
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$path = trim(str_replace($scriptName, '', $parsedUrl['path']), '/');

// Routing
switch ($path) {
    case 'form':
        include 'src/View/Form.php';
        break;
    default:
        include 'src/View/List.php';
        break;
}
