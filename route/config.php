<?php


use vendor\core\Router;


require '../vendor/libs/debug.php';

define('ROOT', dirname(__DIR__));
define('LAYOUT', 'default');

spl_autoload_register(function($class){
   $file = ROOT . '/' . str_replace('\\','/', $class) . '.php';
   If (is_file($file)){
       require_once $file;
   }
});

$query = rtrim(ltrim($_SERVER['REQUEST_URI'],'/'),'/');


Router::addRoutes('posts/index',['controller'=>'posts', 'action'=>'index']);
Router::addRoutes('posts/add',['controller'=>'posts', 'action'=>'add']);
Router::addRoutes('about',['controller'=>'Main', 'action'=>'about']);

Router::addRoutes('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)$');
Router::addRoutes('^(?P<controller>[a-z-]+)$');
Router::addRoutes('^$',['controller'=>'main', 'action'=>'index']);

Router::dispatch($query);