<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'body', 'post_id', 'user_photo', 'is_active'];

    public function post(){
    	return $this->belongsTo('App\Post');
    }
    
    public function commentreplies(){
    	return $this->hasMany('App\CommentReply');
    }
}
