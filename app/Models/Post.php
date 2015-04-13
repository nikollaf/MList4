<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Post extends Model {

    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeApproved($query)
    {
        return $query->where('approval', '=', 'Y');
    }

    public function scopeCurrentMonth($query)
    {
    	return $query->where(DB::raw('MONTH(created_at)'), '=', date('n'));
    }

}
