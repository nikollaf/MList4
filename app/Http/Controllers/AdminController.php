<?php namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
    public function index(Request $request)
    {
        $approve = $request->query('approve');

        $posts = Post::orderBy('created_at', 'DESC')->where('approval', '=', $approve)->categories()
                    ->select('posts.id', 'user_id', 'title', 'url', 'query_url', 'approval', 'label', 'clicks')
                    ->simplePaginate(15);
        $categories = Category::get();

        $data = [
            'posts' => $posts,
            'categories' => $categories
        ];

        return view('admin.admin')->with($data);
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
        $post->category_id  = $data['category_id'];
        $post->approval     = $data['approval']; 
        $post->save();

        return redirect()->back()->with('success', 'Your post has been saved.');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showUsers()
    {
        $users = User::orderBy('created_at')->simplePaginate(15);
        return view('admin.users')->with('users', $users);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function saveuser(Request $request)
    {
        $data = $request->input();
        print_r($data);

        $user = User::find($data['id']);
        if ($request->has('admin')) {
            $user->admin     = 'Y';
        } else {
            $user->admin     = 'N';
        }
        if ($request->has('trust')) {
            $user->trust     = 'Y';
        } else {
            $user->trust     = 'N';
        }
        
        $user->save();

        
        return redirect()->back()->with('success', 'The user has been updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showCategories()
    {
        $categories = Category::get();
        return view('admin.category')->with('categories', $categories);
    }

      /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function saveCategory(Request $request)
    {
        $data = $request->all();
        
        return redirect()->back()->with('success', 'Your category has been saved.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateCategory(Request $request)
    {
        $data = $request->all();
        if ( $data['id'] == 0 ) {
            $post = new Category;
            $post->label        = $data['label'];
            $post->color        = $data['color'];
            $post->save();
        } else {
            $category = Category::find($data['id']);
            $category->label        = $data['label'];
            $category->color        = $data['color'];
            $category->save();
        }
        
        return redirect()->back()->with('success', 'Your category has been updated.');
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
