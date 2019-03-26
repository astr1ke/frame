<?php

use Core\Router;

/*Конструктор пользовательских роутов*/
Router::get('/', ['controller' => 'MainController', 'action' => 'index']);


Router::get('posts/index', ['controller' => 'posts',           'ActionController' => 'index'    ]);
Router::get('posts/add',   ['controller' => 'PostsController', 'action'           => 'add'      ]);
Router::get('about',       ['controller' => 'MainController',  'action'           => 'about'    ]);
Router::get('contacts',    ['controller' => 'MainController',  'action'           => 'contacts' ]);


Router::get('articleCatalog',               ['controller' => 'ArticleController', 'action' => 'articleCatalogAll']);
Router::get('articleCatalog/categorie/{i}', ['controller' => 'ArticleController', 'action' => 'findCategorie'    ]);
Router::get('article/{i}',                  ['controller' => 'ArticleController', 'action' => 'viewArticle'      ]);
Router::get('article/{i}',                  ['controller' => 'ArticleController', 'action' => 'viewArticle'      ]);


Router::post('search', ['controller' => 'ArticleController', 'action' => 'search']);


Router::get( 'login',       ['controller' => 'AuthController',    'action' => 'login'       ]);
Router::get( 'logout',      ['controller' => 'AuthController',    'action' => 'logout'      ]);
Router::get( 'register',    ['controller' => 'AuthController',    'action' => 'register'    ]);
Router::post('login',       ['controller' => 'AuthController',    'action' => 'postLogin'   ]);
Router::post('register',    ['controller' => 'AuthController',    'action' => 'postRegister']);


Router::post('ulogin', ['controller' => 'uLoginController', 'action' => 'login']);


Router::post('/admin/aboutMeEdit',    ['controller' => 'AdminController',    'action' => 'aboutMeEditPost']);//->middleware('isAdmin');
Router::post('/admin/socialEdit',     ['controller' => 'AdminController',    'action' => 'socialEditPost' ]);//->middleware('isAdmin');
Router::get( '/admin/articles',       ['controller' => 'AdminController',    'action' => 'articlesCatalog']);//->middleware('isAdmin');
Router::get( '/admin/categories',     ['controller' => 'AdminController',    'action' => 'categories'     ]);//->middleware('isAdmin');
Router::get( '/admin/aboutMePageEdit',['controller' => 'AdminController',    'action' => 'aboutMePageEdit']);//->middleware('isAdmin');
Router::post('/admin/aboutMePageEdit',['controller' => 'AdminController',    'action' => 'aboutMePagePost']);//->middleware('isAdmin');