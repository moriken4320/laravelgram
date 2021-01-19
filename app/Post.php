<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // belongsToの設定
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // hasManyの設定
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
