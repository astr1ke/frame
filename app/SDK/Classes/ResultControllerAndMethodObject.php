<?php
/**
 * Created by PhpStorm.
 * User: astri
 * Date: 2019-03-22
 * Time: 13:43
 */

namespace SDK\Classes;

class ResultControllerAndMethodObject {

    public $controller;

    public $action;

    public $urlNumeric;

    public $middleware;

    public function __construct($controller, $action, $middleware = null, $urlNumeric = null) {
        $this->controller = $controller;
        $this->action = $action;
        $this->urlNumeric = $urlNumeric;
        $this->middleware = $middleware;
    }
}