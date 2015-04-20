<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    
    public $timestamps = false;

    protected $table = 'categories';

    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }

}