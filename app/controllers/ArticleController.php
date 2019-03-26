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
use Models\Comment;

class ArticleController extends BaseController
{
    public function viewArticle ($id) {
        $articleV = Article::find($id);
        $articleViews = $articleV->views;

        $articlesAll = Article::all();
        $articles = Article::find($id);
        $id = $articles->id;
        $cc = count(Comment::where('article_id',$id));//->get());
        return view('Article.articleView',['articles'=>$articles,'id'=>$id, 'cc'=>$cc, 'articlesAll'=>$articlesAll,'articleViews'=>$articleViews]);
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



    private function makeUrlVideo($str){
        //<iframe width="854" height="480" src="https://www.youtube.com/embed/LYg26_LBlZ8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        $mass = explode(" ", $str);
        foreach ($mass as $m){
            if(stristr($m, 'src="') == TRUE) {
                $str = stristr($m,"\"");
                $str = substr($str,1);
                $str = stristr($str,"\"",true);
                return $str;
            }
        }
    }

    public function view($id){
        $articleV = Article::find($id);
        $articleViews = $articleV->views;
        $articleViews = $articleViews + 1;
        $articleV -> views = $articleViews;
        $articleV ->save();

        $articlesAll = Article::all();
        $articles = article::find($id);
        $id = $articles->id;
        $cc = count(Comment::where('article_id',$id));//->get());
        return view('articleView',['articles'=>$articles,'id'=>$id, 'cc'=>$cc, 'articlesAll'=>$articlesAll,'articleViews'=>$articleViews]);
    }

    public function create(){
        $categories = Categorie::all();
        return view('editor.articleCreate',['categories'=>$categories]);
    }

    public function createPost($request){
//        $this->validate($request, [
//            'title' =>'required|max:50',
//            'categorie_id' =>'required',
//            'text' =>'required'
//        ]);

        if (isset($request->checkType)){

            if ($request->video != '') {
                $path = $this->makeUrlVideo($request->video);
                $path = $path . '?rel=0&amp;showinfo=0';

            }else{
                $path = '';
            }
            Article::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'categorie_id' => $request->categorie_id,
                'text' => $request->text,
                'image' => $path,
            ]);

        }else {
            echo 'eee';
//            $path = Storage::disk('public')->put('uploads', $request->image);
//            $path = '/storage/' . $path;
            $path = '/storage/uploads/6Ka0QS3LOsa4dcjL7LJilPLR6K3uSBmqyrGD8jLW.jpeg';
            echo $request->user_id . '<br>';
            echo $request->title . '<br>';
            echo $request->categorie_id . '<br>';
            echo $request->text. '<br>';
            Article::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'categorie_id' => $request->categorie_id,
                'text' => $request->text,
                'image' => $path,
            ]);
        }
        //return redirect('/');
    }

    public function catalog(){
        $articles = Article::orderBy('created_at','DESC');//->paginate(30);
        $title = "Каталог статей";
        return view('articleCatalog', ['articles'=>$articles,'title'=>$title]);
    }

    public function catalogCategorie($id){
        $articles = Article::orderBy('created_at','DESC')->where('categorie_id',$id)->paginate(30);
        $cat = Categorie::find($id);
        $cat = $cat->name;
        $title = "Статьи с категорией $cat";
        return view('articleCatalog', ['articles'=>$articles,'title'=>$title]);
    }

    public function delete($id){
        Comment::where('article_id',$id)->delete();
        Article::destroy($id);
        $articles = article::orderBy('created_at','DESC');//->paginate(30);
        return view('admin.articleCatalogAdmin', ['articles'=>$articles]);
    }

    public function edit($id){
        $article =  Article::find($id);
        $categories = Categorie::all();
        return view('editor.articleEdit',['article'=>$article,'categories'=>$categories]);
    }

    public function editPost($request)
    {
//        $this->validate($request, [
//            'title' => 'required|max:50',
//            'categorie_id' => 'required',
//            'text' => 'required'
//        ]);
        $article = Article::find($request->article_id);
        if (isset($request->checkType)) {

            if ($request->video != '') {
                $path = $this->makeUrlVideo($request->video);
                $path = $path . '?rel=0&amp;showinfo=0';

            } else {
                $path = '';
            }
            $article->update([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'categorie_id' => $request->categorie_id,
                'text' => $request->text,
                'image' => $path,
            ]);


        } else {

            if (isset($request->image)) {

//                $path = Storage::disk('public')->put('uploads', $request->image);
//                $path = '/storage/' . $path;
                $article->update([
                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'categorie_id' => $request->categorie_id,
                    'text' => $request->text,
//                    'image' => $path,
                ]);

            } else {

                $article->update([
                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'categorie_id' => $request->categorie_id,
                    'text' => $request->text,
                ]);
            }
        }
        return redirect('/admin/articles');
    }
}