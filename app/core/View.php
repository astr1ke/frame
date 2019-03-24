<?php

namespace Core;

class View
{
    public $viewFolderName;

    public $viewFileName;

    public  $viewVariables;

    public function __construct($viewFolderName, $viewFileName = ''){
        $this->viewFolderName = $viewFolderName;
        $this->viewFileName = $viewFileName;
    }

    public function render(){
        $variables = $this->viewVariables;
        if ($variables) {
            extract($variables);
        }
        ob_start();
            $viewFile = ROOT . "/view/{$this->viewFolderName}/{$this->viewFileName}.php";
            if (is_file($viewFile)){
                require $viewFile;
            }else{
                echo 'Файл Вида ' . $viewFile . ' не найден';
            }
        $content = ob_get_clean();

        $file_layout = ROOT . "/view/layout/" . LAYOUT . ".php";
        if (is_file($file_layout)) {
            require $file_layout;
        }
    }

    public function setVariables($variables) {
        $this->viewVariables = $variables;
    }
}