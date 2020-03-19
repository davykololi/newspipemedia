<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';
    protected $fillable = ['name'];

    public function posts()
    {
    	return $this->belongsToMany('App\Models\Post','post_tag')->withTimestamps();
    }

    public function videos()
    {
    	return $this->belongsToMany('App\Models\Video','tag_video')->withTimestamps();
    }
}