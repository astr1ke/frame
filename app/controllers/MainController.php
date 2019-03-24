<?php

namespace Controllers;

use Core\BaseController;
use Models\aboutMe;
use Models\Article;

class MainController extends BaseController {

    /**
     * Отображение Главной страницы
     * @return \Core\View
     */
    public function index () {
        $articles = Article::All();
        return view('Main.index',['articles' => $articles]);
    }

    /**
     * Обображение страницы обо мне
     * @return \Core\View
     */
    public function about () {
        $aboutMe = aboutMe::findOne(1);
        return view('Main.about', ['aboutMe' => $aboutMe]);
    }

    public function contacts () {
        return view('Main.contacts');
    }
}