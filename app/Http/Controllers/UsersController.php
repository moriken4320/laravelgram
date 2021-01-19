<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($user_id)
    {
        // マッチしたレコードの最初のレコードだけを返す。
        $user = User::where('id',$user_id)->firstOrFail();

        return view('user.show',['user'=>$user]);
    }
}
