<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['name', 'email', 'body', 'comment_id', 'user_photo', 'is_active'];

	public function comment(){
		return $this->belongsTo('App\Comment');
	}
}
