<?php
/**
 * Created by PhpStorm.
 * User: astri
 * Date: 2019-03-23
 * Time: 22:52
 */

namespace Controllers;

use Core\BaseController;
use Models\Article;
use Models\Categorie;
use SDK\Classes\CollectionObject;

class ArticleController extends BaseController
{
        public function viewArticle ($i) {
            $article = Article::find($i);
            $articleViews = $article->views;
            return view('Article.articleView', ['article' => $article, 'articleViews' => $articleViews]);
        }

        public function articleCatalogAll () {
            $articles = Article::orderBy('created_at','DESC');//->paginate(30);
            $title = "Каталог статей";
            return view('Article.articleCatalog', ['articles'=>$articles,'title'=>$title]);
        }

        public function findCategorie ($id) {
            $articles = (Article::orderBy('created_at','DESC'))->where('categorie_id',$id);//->paginate(30);

            $categorie = Categorie::find($id);
            $categorie = $categorie->name;
            $title = "Статьи с категорией $categorie";
            return view('Article.articleCatalog', ['articles'=>$articles,'title'=>$title]);
        }

        public function search ($request) {
            $articles1 = Article::findLike("%$request->srch%", 'title','articles');//->orWhere('text','LIKE',"%$request->srch%");//->paginate(30);
            $articles2 = Article::findLike("%$request->srch%", 'text','articles');

            $articles1 = object_to_array($articles1);
            $articles2 = object_to_array($articles2);

            //если данные поиска собраны не из одной статьи то соединяем массивы поиска
            if ($articles1 != $articles2) {
                $articles = array_merge($articles1, $articles2);
            } else {
                $articles = $articles1;
            }

            $articles = array_to_collectionObject($articles);

            if ($articles){
                $title = "Поиск по фразе: $request->srch";
            }else{
                $title = "По фразе: \"$request->srch\" ничего не найдено ";
            }
            return view('Article.articleCatalog',['articles' => $articles,'title' => $title]);
        }
}