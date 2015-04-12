<?php namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Models\Post;
use App\Models\Clicks;

use Illuminate\Http\Request;

class DataController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postClick(Request $request)
	{
        $input = $request->all();
        $ip   = $request->ip();

        $data = Clicks::where('ip', '=', $ip)->where('post_id', '=', $input['postId'])->get();

        if ($data->isEmpty()){
            $click = new Clicks;
            $click->post_id     = $input['postId'];
            $click->ip          = $ip;
            $click->save();

            $post = Post::find($input['postId']);
            $post->clicks = $post['clicks'] + 1;
            $post->save();
        }


	}

}