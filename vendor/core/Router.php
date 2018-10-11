<?php

namespace vendor\core;

class Router {
    protected static $routes = [];
    protected static $route = [];

    public static function addRoutes($string, $route = []){
        self::$routes[$string] = $route;
    }

    public static function getRoutes(){
        return self::$routes;

    }

    public static function getRoute(){
        return self::$route;
    }

    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if (preg_match("#$pattern#i", $url, $matches)) {
                if (isset($matches['controller'])){
                    foreach($matches as $k => $v){
                        if(is_string($k)){
                            self::$route[$k] = $v;
                        }
                    }
                    if(!isset(self::$route['action'])) self::$route['action'] = 'index';

                }else{
                    foreach($route as $k => $v){
                        self::$route[$k] = $v;
                    }
                    if(!isset(self::$route['action'])) self::$route['action'] = 'index';
                }
                self::$route['controller'] = ucfirst(self::$route['controller']);
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url){
        if(self::matchRoute($url)){
            $controller = 'controllers\\' . self::$route['controller'];
            if(class_exists($controller)){
                $obj = new $controller(self::$route);
                $action =  self::$route['action'];
                if (method_exists($obj, $action)){


                    $obj->$action();



                }else{
                    echo 'Метод ' . $action . ' класса ' . $controller . ' не найден';
                }
            }else{
                echo 'Класс ' . $controller . ' не найден';
            }
        }else{
            include '404.html';
        }
    }
}