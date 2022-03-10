<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Auth;

class PostController extends Controller
{

    /*function __construct(){
        $this->middleware("auth")->only("destroy", "restore", "create", "store");
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(8);
        return view('posts.index', ["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', ["users"=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        /*$request->validate([
            "title"=>"required|min:3|unique:posts",
            "description"=>"required|min:10"
        ],
        [
           "title.required"=>"Come on! Give your post a proper unique title..",
           "title.unique"=>"Come on! Give your post a proper unique title.."
        ]);
        //dump($request->all());*/
        
   
        Post::create($request->all());

        return to_route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        //dump($post->all());
        return view('posts.show', ["row"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ["row"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        /*if($post['title'] != $request->all()['title']){
            $request->validate([
                "title"=>"required|min:3|unique:posts",
            ],
            [
               "title.required"=>"Come on! Give your post a proper unique title..",
               "title.unique"=>"Come on! Give your post a proper unique title.."
            ]);
        }
        $request->validate([
            "description"=>"required|min:10"
        ]);*/

        //dump(Auth::id());
        //dump($post->user->id);

        //dump($request->all());
        if(Auth::id() == $post->user->id){
            $post->update($request->all());
            return to_route("posts.show", $post);
        }
        return back()->withErrors(['msg' => 'Sorry, You are not the Author of this post!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        if(Auth::id() == $post->user->id){
            $post->delete();
            return to_route("posts.index");
        }
        return back()->withErrors(['msg' => 'Sorry, You are not the Author of this post!']);
;
    }

    function deleted(){
        $posts = Post::onlyTrashed()->get();
        return view("posts.deleted", ["posts"=>$posts]);
    }

    function restore(Post $post){
        $post->restore();
        return to_route("posts.deleted");
    }
}
