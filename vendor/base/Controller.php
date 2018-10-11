<?php

namespace vendor\base;

use view\View;

class Controller{
    public $route;
    public $view;
    public $layout;

    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];
        $this->layout = '';
    }


}