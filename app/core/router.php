<?php

namespace Core;

use SDK\Classes\ResultControllerAndMethodObject;

class Router {
    protected static $allRoutes = [];
    protected static $route = [];
    protected static $urlNumeric = false;

    public static function get($routeString, $routeData = []){
        $routeData['method'] = 'GET';
        self::$allRoutes[$routeString] = $routeData;
    }

    public static function post($routeString, $routeData = []){
        $routeData['method'] = 'POST';
        self::$allRoutes[$routeString] = $routeData;
    }

    public static function matchRoute($url, $method){
        //если урл пуст - вставляем в него '/'
        if ($url === '') {
            $url = '/';
        }

        //перебираем все елементы со строками роутов
        foreach (self::$allRoutes as $routeString => $route){

            //если в строке нет элементов с димакическими элементами в скобках {}
            if (strpos($routeString, '{') === false) {

                //если строка с роутом равна строки из урла то...
                if ($routeString == $url && $route['method'] == $method) {
                    //ниже заполняем данные об нужном контроллере и методе
                    //на основании данных из урла
                    self::$route['controller'] = $route['controller'];
                    self::$route['action'] = $route['action'];

                    return true;
                }
            } else {
                //массив строк из роута разделенный слешем
                $routeStringArray = explode('/', $routeString);

                //массив строк из урла разделенных слешем
                $urlArray = explode('/', $url);

                //получение последней строки из массива урла
                // и его непосредственного удаления из массива
                $numeric = array_pop($urlArray);

                //если последний элемент урла - число то...
                if (is_numeric($numeric)) {

                    //удаляем последний элемент из массива текущего роута
                    array_pop($routeStringArray);

                    //если массивы равны то заполняем нужные данные
                    //контроллера и метода
                    if ($routeStringArray == $urlArray && $route['method'] == $method) {
                        self::$route['controller'] = $route['controller'];
                        self::$route['action'] = $route['action'];
                        self::$urlNumeric = $numeric;
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public static function dispatch($url, $method){
        if(self::matchRoute($url, $method)){
            $controller = 'Controllers\\' . self::$route['controller'];
            if(class_exists($controller)){
                $obj = new $controller(self::$route);
                $action =  self::$route['action'];
                if (method_exists($obj, $action)){
                    unset($obj);
                    return new ResultControllerAndMethodObject(self::$route['controller'], self::$route['action'], self::$urlNumeric);
                }else{
                    echo 'Метод ' . $action . ' класса ' . $controller . ' не найден';
                }
            }else{
                echo 'Класс ' . $controller . ' не найден';
            }
        }else{
            include '404.html';
            die();
        }
    }
}