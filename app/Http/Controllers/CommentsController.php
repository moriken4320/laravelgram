<?php

namespace App\Http\Controllers;

use App\Comment;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , [
            'comment' => 'required|string|max:20',
            ]);
        
        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
