<?php namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Vote;
use App\Models\Category;
use View;
use DB;
use Auth;
use Form;

use Illuminate\Http\Request;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts = Post::orderBy('created_at', 'DESC')->approved()->categories()->simplePaginate(10);
        $top   = Post::take(5)->orderBy('clicks', 'DESC')->currentmonth()->approved()->get();
        $categories = Category::get();

        $data = [
            'posts' => $posts,
            'top'  => $top,
            'categories' => $categories
        ];

        return view('welcome')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create()
    {
        return view('app');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $data = $request->all();
        $post = new Post;
        $post->user_id      = Auth::user()->id;
        $post->title        = $data['title'];
        $post->query_url    = str_slug($data['title'], '-');
        $post->url          = $data['url'];
        $post->category_id  = $data['category_id'];
        if (Auth::user()->trust = 'Y'){
            $post->approval = 'Y';
            $message = 'Your post has been submitted!';
        } else {
        	$message = 'Your post has been submitted. We will add it to the collection after it is approved';
        }

        $post->save();
        return redirect()->back()->with('success', $message);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function vote(Request $request)
	{
		$input = $request->except('_token');
        $data = Vote::where('user_id', '=', Auth::user()->id)->where('post_id', '=', $input['post_id'])->first();
        $average = ($input['vote1'] + $input['vote2'] + $input['vote3']) / 3;


        if (! $data ) { 
	        $vote = new Vote($input);
	        $vote->user_id = Auth::user()->id;
	        $vote->save();
	        $post = Post::find($input['post_id']);
	        if ($post->votes != '') {
	        	$post->votes = ($post['votes'] + $average) / 2;
	        } else {
	        	$post->votes = $average;
	        }
	        $post->save();
	        return redirect()->back()->with('success', 'Thanks for your vote!');
	    } else {
	    	return redirect()->back()->with('success', 'You\'ve already voted!');
	    }
        
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::where('posts.query_url', '=', $id)->categories()->select('posts.id', 'posts.title', 'posts.url')->first();
        $posts = Post::take(10)->orderBy('created_at')
            ->where('id', '!=' , $post['id'])
            ->currentmonth()
            ->where('category_id', '=', $post['category_id'])->get();
        if (Auth::check()){
        	$vote = Vote::where('user_id', '=', Auth::user()->id)->where('post_id', '=', $post['id'])->first();
        } else {
        	$vote = [];
        }
        
        $votes = Vote::where('post_id', '=', $post['id'])
        			->select(DB::raw('AVG(vote1) AS vote1average'), DB::raw('AVG(vote2) AS vote2average'), DB::raw('AVG(vote3) AS vote3average'))
        			->first();
       	$categories = Category::get();

        $data = [
            'post' 	=> $post,
            'posts' => $posts,
            'vote' 	=> $vote,
            'votes' => $votes,
            'categories' => $categories
        ];

        //return response()->json($data);
        return view('post.post')->with($data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
