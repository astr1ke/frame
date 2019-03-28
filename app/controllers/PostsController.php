<?php
/**
 * Created by PhpStorm.
 * User: Astri
 * Date: 10.10.2018
 * Time: 21:12
 */

namespace controllers;


class PostsController
{
    public function add(){
        echo "Запущен метод Add страницы с постами";
    }

    public function getAll(){
        $this->layout = 'main';
        $this->view = 'allPosts';
    }

}