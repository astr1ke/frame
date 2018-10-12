<?php
/**
 * Created by PhpStorm.
 * User: Astri
 * Date: 10.10.2018
 * Time: 21:11
 */

namespace controllers;

use model\Main;


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



        Main::create(
        [
            'id' => '5',
            'name' => 'yoo',
            'password' => '32223',
            'mail' => 'mail@mail.ru'
            ]
        );

        $this->setVars(['company'=>$company,'about'=>$about, 'all' => 'все супер']);
    }

}