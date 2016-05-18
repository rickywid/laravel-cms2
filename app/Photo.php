<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['filename'];

	protected $path = '/images/';

	public function getFilenameAttribute($value){

		return $this->path.$value;
	}

}
