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

    public $method;

    public $urlNumeric;

    public function __construct($controller, $method, $urlNumeric = false) {
        $this->controller = $controller;
        $this->method = $method;
        $this->urlNumeric = $urlNumeric;
    }
}