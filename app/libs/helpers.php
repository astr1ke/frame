<?php

/**
 * Удобная функция дебага
 * @param $arr
 */
function debug ($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

/**
 * создание объекта View со всеми параметрами
 * @param $view
 * @param null $params
 * @return \Core\View
 */
function view ($view, $params = null) {
    if (strpos($view,'.') == false) {
        $viewFolder = false;
        $viewFile   = $view;
    } else {
        $massiv = explode('.', trim($view));
        $viewFolder = $massiv [0];
        $viewFile   = $massiv [1];
    }

    $viewObject = new \Core\View($viewFolder, $viewFile);
    if ($params !== null) {
        $viewObject->setVariables($params);
    }
    return $viewObject;
}

/**
 * Объект в массив
 * @param $object
 * @return array
 */
function object_to_array ($object) {
    $array = array();
    foreach ($object as $key => $value) {
        $array[$key] = $value;
    }
    return $array;
}

/**
 * Массив в объект Коллекций
 * @param array $array
 * @return \SDK\Classes\CollectionObject
 */
function array_to_collectionObject (array $array) {
    $object = new \SDK\Classes\CollectionObject();
    foreach ($array as $key => $value) {
        $object->addField($key, $value);
    }
    return $object;
}