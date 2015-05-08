<?php

session_start();

include_once('includes/config.php');

// Extract the $controllerName, $actionName and $params from the HTTP request
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestParts = explode('/', $requestPath);
$controllerName = DEFAULT_CONTROLLER;
if (count($requestParts) >= 2 && $requestParts[1] != '') {
    $controllerName = strtolower($requestParts[1]);
    if (! preg_match('/^[a-zA-Z0-9_]+$/', $controllerName)) {
        die('Invalid controller name. Use letters, digits and underscore only.');
    }
}
$actionName = DEFAULT_ACTION;
if (count($requestParts) >= 3 && $requestParts[2] != '') {
    $actionName = $requestParts[2];
    if (! preg_match('/^[a-zA-Z0-9_]+$/', $actionName)) {
        die('Invalid action name. Use letters, digits and underscore only.');
    }
}
$params = [];
if (count($requestParts) >= 4) {
    $params = array_splice($requestParts, 3);
}

// Load the controller and execute the action
$controllerClassName = ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName($controllerName, $actionName);
    if (method_exists($controller, $actionName)) {
        // Call $controller->$action($params)
        call_user_func_array(array($controller, $actionName), $params);
        $controller->renderView();
    } else {
        die ('Error: cannot find action "' . $actionName . '" in controller ' . $controllerClassName);
    }
} else {
    $controllerFileName = 'controllers/' . $controllerClassName . '.php';
    die ('Error: cannot find controller: ' . $controllerFileName);
}

function __autoload($class_name) {
    if (file_exists("controllers/$class_name.php")) {
        include "controllers/$class_name.php";
    }
    if (file_exists("models/$class_name.php")) {
        include "models/$class_name.php";
    }
}
