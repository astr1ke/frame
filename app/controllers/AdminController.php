<?php

namespace Controllers;

use Core\BaseController;
use Models\about;
use Models\aboutMe;
use Models\Article;
use Models\social;

class AdminController extends BaseController
{
    public function aboutMeEditPost($request) {
        $aboutMe = aboutMe::find(1);
        if (isset($request->foto)){
            //$path = Storage::disk('public')->put('avatars',$request->foto);

            $aboutMe->update([
                //'foto'=>$path,
                'name'=>$request->name,
                'title'=>$request->title,
                'text'=>$request->text,
            ]);
        }
        else{
            $aboutMe->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'text'=>$request->text,
            ]);
        }
        return redirect('/admin/aboutMeEdit');
    }

    public function socialEditPost($request) {
        $social = social::find(1);
        $social->update([
            'ok'=>$request->ok,
            'vk'=>$request->vk,
            'inst'=>$request->inst,
            'utub'=>$request->utub,
        ]);
        return redirect('/admin/aboutMeEdit');
    }

    public function articlesCatalog() {
        $articles = Article::orderBy('created_at','DESC');//->paginate(30);
        return view('admin.articleCatalogAdmin', ['articles'=>$articles]);
    }

    public function aboutMePageEdit() {
        $aboutMe = about::find(1);
        return view('editor.aboutMePageEdit',['aboutMe'=>$aboutMe]);
    }

    public function aboutMePagePost($request) {
        $about = about::find(1);
        $about->update([
            'text'=>$request->text,
        ]);
        return redirect('/about');
    }
}