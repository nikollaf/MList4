<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model {

    protected $table = 'votes';

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
