<?php

use Core\Router;

/*Конструктор пользовательских роутов*/
Router::get('/', ['controller' => 'MainController', 'action' => 'index']);


Router::get('posts/index', ['controller' => 'posts',           'ActionController' => 'index']);
Router::get('posts/add',   ['controller' => 'PostsController', 'action'           => 'add']);
Router::get('about',       ['controller' => 'MainController',  'action'           => 'about']);
Router::get('contacts',    ['controller' => 'MainController',  'action'           => 'contacts']);


Router::get('articleCatalog',               ['controller' => 'ArticleController', 'action' => 'articleCatalogAll']);
Router::get('articleCatalog/categorie/{i}', ['controller' => 'ArticleController', 'action' => 'findCategorie']);
Router::get('article/{i}',                  ['controller' => 'ArticleController', 'action' => 'viewArticle']);
Router::get('article/{i}',                  ['controller' => 'ArticleController', 'action' => 'viewArticle']);


Router::post('search', ['controller' => 'ArticleController', 'action' => 'search']);



