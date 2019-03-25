<?php
/**
 * Created by PhpStorm.
 * User: astri
 * Date: 2019-03-25
 * Time: 17:33
 */

namespace SDK\Classes;


class ViewObject {

    public $viewFile;

    public $viewVariables = array();

    public function __construct($viewFile, $viewVariables) {
        $this->viewFile = $viewFile;
        $this->viewVariables = $viewVariables;
    }

}