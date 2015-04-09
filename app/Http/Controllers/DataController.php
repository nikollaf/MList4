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
        $data = $request->all();
        $ip   = $request->ip();
        

	        $post = Post::find($data['postId']);
	        $post->clicks = $post['clicks'] + 1;
	        $post->save();

        print_r($ip);

        // $post = new Post;
        // $post->user_id      = Auth::user()->id;
        // $post->title        = $data['title'];
        // $post->query_url    = str_slug($data['title'], '-');
        // $post->url          = $data['url'];
        // $post->category     = $data['category'];
        // $post->save();
        
        //return redirect()->back()->with('message', 'Your post has been submitted. We will add it the collection.');
	}

}