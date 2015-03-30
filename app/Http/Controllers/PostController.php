<?php namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
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
		#$date = DB::table('posts')->orderBy('created_at')->distinct()->get(array('created_at', 'created_at'));

//		$posts = Post::all()->groupBy(function($item){
//			return $item->created_at->format('d-M-y');
//		})->toArray();
        $posts = Post::orderBy('created_at')->simplePaginate(15);

		//$postss = Post::all()->groupBy('created_at')->distinct()->get();
		//$posts = Post::all();
		//$post_date = DB::table('posts')->groupBy('created_at')->get();
		//$data = $posts['26-Mar-15'];
		// $data = array(
		// 	'posts' => $posts
		// );
		// foreach($posts as $post){
		// 	echo "<pre>";
		// 	print_r($post);
		// 	echo "</pre>";
		// }
		return view('welcome')->with('posts', $posts);
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
        $post->category     = $data['category'];
        $post->save();
        return redirect()->back()->with('message', 'Your post has been submitted. We will add it the collection.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
