<?php

use Core\Router;
use Jenssegers\Blade\Blade;

/* ------------------------------------------------------
 * Подключение сервисов и вспомогательных компонентов*/
require '../app/libs/helpers.php';
/* -----------------------------------------------------*/



/* ------------------------------------------------------
 * Подключение констант*/
include '../config/const.php';
/* -----------------------------------------------------*/



/* ------------------------------------------------------
 * Подключение роутинга*/
require '../routes/routes.php';
/*------------------------------------------------------*/



/* ------------------------------------------------------
 * Получение значения нужного контроллера и его метода*/
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = rtrim(ltrim($_SERVER['REQUEST_URI'],'/'),'/');

$resultControllerAndMethodValue = Router::dispatch($requestUri, $requestMethod);
/*------------------------------------------------------*/



/* Промежуточный пункт. Создание объекта с Post данными в случае POST запроса */
if ($requestMethod === 'POST') {
    $postData = $_POST;
    $postDataObject = new \SDK\Classes\CollectionObject();
    foreach ($_POST as $key => $value) {
        $postDataObject->addField($key, $value);
    }
}
/*------------------------------------------------------*/


//Отпределение нужного контроллера и его метода
$controllerClass = 'Controllers\\' . $resultControllerAndMethodValue->controller;
$method = $resultControllerAndMethodValue->method;

// создание объекта нужного контроллера и вызов нужного метода
if ($requestMethod == 'POST') {
    $result = (new $controllerClass())->$method($postDataObject);
} else {
    $result = (new $controllerClass())->$method($resultControllerAndMethodValue->urlNumeric);
}



//Обработка результата полученного из контроллера:

//Если класс полученого объекта - класс View то...
if (get_class($result) == 'SDK\Classes\ViewObject') {
    $view = $result->viewFile;
    $variables = $result->viewVariables;
    $blade = new Blade(ROOT . '/view', ROOT . '/cache');

    echo $blade->make($view, $variables);
}


