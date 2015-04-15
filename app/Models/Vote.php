<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vote extends Model {

    protected $table = 'votes';

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['vote1', 'vote2', 'vote3', 'post_id', 'ip', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
