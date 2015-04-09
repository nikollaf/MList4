<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Clicks extends Model {

    protected $table = 'clicks';

    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }
}
