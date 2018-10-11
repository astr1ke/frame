<?php
/**
 * Created by PhpStorm.
 * User: Astri
 * Date: 10.10.2018
 * Time: 21:11
 */

namespace controllers;


class MainController extends App{

    public $layout = 'default';

    public function index(){
       // $this->layout = false;
    }

    public function about(){
        $this->layout = 'main';
        $this->view = 'about';
        $company = 'ГазПром';
        $about = 'Мы лучшие';
        $this->setVars(['company'=>$company,'about'=>$about, 'all' => 'все супер']);
    }

}