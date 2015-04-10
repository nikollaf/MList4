<?php namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Post;
use View;
use DB;
use Auth;
use Form;

use Illuminate\Http\Request;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $posts = Post::orderBy('created_at')->where('approval', '=', 'N')->simplePaginate(15);
            return view('admin.admin')->with('posts', $posts);
        } else {
            return redirect()->back();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = Post::find($data['id']);
        $post->title        = $data['title'];
        $post->query_url    = str_slug($data['title'], '-');
        $post->url          = $data['url'];
        //$post->category     = $data['category'];
        $post->approval     = $data['approval']; 
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
