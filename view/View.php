<?php

namespace view;


class View
{
    public $route;

    public $view;

    public $layout;

    public function __construct($route, $layout = '', $view = ''){
        $this->route = $route;
        $this->view = $view;
        $this->layout = $layout ?: LAYOUT;
    }

    public function render(){

        ob_start();
            $file_view = ROOT . "/view/{$this->route['controller']}/{$this->view}.php";
            if (is_file($file_view)){
                require $file_view;
            }else{
                echo 'Файл Вида ' . $file_view . ' не найден';
            }
        $content = ob_get_clean();

        $file_layout = ROOT . "/view/layout/{$this->layout}.php";
        if(is_file($file_layout)){
            require $file_layout;
        }else{
            echo 'Файл Шаблона ' . $file_layout . ' не найден';
        }



    }


}