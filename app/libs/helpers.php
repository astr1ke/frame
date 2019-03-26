<?php

/**
 * Удобная функция дебага
 * @param $arr
 */
function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

/**
 * @param $view
 * @param array $variables
 * @return \SDK\Classes\ViewObject
 */
function view($view, $variables = []) {
    $viewInfo = [];
    $viewInfo['view'] = $view;
    $viewInfo['variables'] = $variables;

    return new \SDK\Classes\ViewObject($viewInfo['view'], $viewInfo['variables']);
}

function redirect($uri) {
    header('Location: '. $uri);
}

/**
 * Объект в массив
 * @param $object
 * @return array
 */
function object_to_array($object) {
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
function array_to_collectionObject(array $array) {
    $object = new \SDK\Classes\CollectionObject();
    foreach ($array as $key => $value) {
        $object->addField($key, $value);
    }
    return $object;
}

/**
 * Вспомогательная функция правильно указывающая
 * путь к необходимому файлу
 * @param $fileOrFolder
 * @return string
 */
function asset($fileOrFolder) {
    return '/' . $fileOrFolder;
}

/**
 * Возвращает рандомную строку нужной длины
 * @param int $length
 * @return bool|string
 */
function quickRandom($length = 16)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}