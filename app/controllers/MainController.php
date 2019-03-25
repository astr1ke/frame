<?php

namespace Controllers;

use Core\BaseController;
use Models\about;
use Models\Article;

class MainController extends BaseController {

    /**
     * Отображение Главной страницы
     * @return \Core\View
     */
    public function index () {
        $articles = Article::All();
        return view('Main.main',['articles' => $articles]);
    }

    /**
     * Обображение страницы обо мне
     * @return
     */
    public function about () {
        $aboutMe = about::find(1);
        return view('Main.about', ['aboutMe' => $aboutMe]);
    }

    public function contacts () {
        return view('Main.contacts');
    }
}