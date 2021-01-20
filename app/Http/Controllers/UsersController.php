<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }

    public function show($user_id)
    {
        // マッチしたレコードの最初のレコードだけを返す。
        $user = User::where('id',$user_id)->firstOrFail();

        return view('user.show',['user'=>$user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.edit',['user'=>$user]);
    }

    public function update(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , [
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
            ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $user = Auth::user();
        $user->name = $request->user_name;
        if ($request->user_profile_photo !=null) {
            // アップロードされた画像ファイルをbase64という形式に変換
            $user->image = base64_encode(file_get_contents($request->user_profile_photo));
            // $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            // $user->profile_photo = $user->id . '.jpg';
        }
        $user->password = bcrypt($request->user_password);
        $user->save();

        return redirect('/users/'.$user->id);
    }
}
