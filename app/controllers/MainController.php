<?php

namespace Controllers;

use Models\about;
use Models\Article;

class MainController
{

    /**
     * Отображение Главной страницы
     * @return \Core\View
     */
    public function index () {
        $articles = Article::All()->reverse();
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