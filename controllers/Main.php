<?php
/**
 * Created by PhpStorm.
 * User: Astri
 * Date: 10.10.2018
 * Time: 21:11
 */

namespace controllers;



use view\View;

class Main extends App{
    public $layout = 'default';
    public function index(){


        $ren = new View($this->route, $this->layout, $this->view);
        $ren->render();
    }

    public function about(){
        $this->layout = 'main';
        $this->view = 'about';

        $ren = new View($this->route, $this->layout, $this->view);
        $ren->render();
    }




}