<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\article;
use Illuminate\Support\Facades\Validator;



class CommentController extends Controller
{

    /**
     * Обработка формы - AJAX
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	public function store(Request $request)
    {

		$data = $request->except('_token', 'comment_post_ID', 'comment_parent','submit');

		//добавляем поля с названиями как в таблице (модели)
		$data['article_id'] = $request->input('comment_post_ID');
		$data['parent_id'] = $request->input('comment_parent');
		
		//устанавливаем статус в зависимости от настройки
		$data['status'] = config('comments.show_immediately');


		$user = Auth::user();


		if($user) {
		    $data['user_id'] = $user->id;
			$data['user'] = (!empty($data['user'])) ? $data['user'] : $user->name;
			$data['email'] = (!empty($data['email'])) ? $data['email'] : $user->email;
		}

		$validator = Validator::make($data,[
			'article_id' => 'integer|required',
			'text' => 'required',
			'user' => 'required',
			'email' => 'required|email',
		]);


		$comment = new Comment($data); 


		if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
		}
		

		$post = article::find($data['article_id']);

		$post->comments()->save($comment);
		

		$data['id'] = $comment->id;
		$data['hash'] = md5($data['email']);
		$data['status'] = config('comments.show_immediately');
		

		$view_comment = view(env('THEME').'.comments.new_comment')->with('data', $data)->render();


        return response()->json(['success'=>true, 'comment'=>$view_comment, 'data'=>$data]);
	}


	public function delete(){
        if (Auth::user()->IsAdmin == 1){
            Comment::destroy($_POST['id']);
            Comment::where('parent_id', $_POST['id'])->delete();
        }else{
            $comment = Comment::find($_POST['id']);
            $comment->text = 'Пользователь удалил свой комментарий';
            $comment->save();
        }
    }
}
