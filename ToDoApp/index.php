<?php
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/config.php';

$fileNotFound = false;

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'todo';
$methodName = isset($_GET['action']) ? $_GET['action'] : 'render';

$controllerClassName = '\Controller\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClassName))
{
    $contoller = new $controllerClassName();
    if (method_exists($contoller, $methodName)) {
        $contoller->$methodName();
    } else {
        $fileNotFound = true;
    }
} else {
    $fileNotFound = true;
}
if ($fileNotFound) {
    //return header 404
}