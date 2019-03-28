<?php
/**
 * Created by PhpStorm.
 * User: astri
 * Date: 2019-03-25
 * Time: 17:33
 */

namespace SDK\Classes;


use Jenssegers\Blade\Blade;

class ViewObject {

    public $viewFile;

    public $viewVariables = array();

    public function __construct($viewFile, $viewVariables) {
        $this->viewFile = $viewFile;
        $this->viewVariables = $viewVariables;
    }

    public function render($viewObject) {
        $view = $viewObject->viewFile;
        $variables = $viewObject->viewVariables;

        $blade = new Blade(ROOT . '/resources/view', ROOT . '/cache');
        return $blade->make($view, $variables);
    }

}