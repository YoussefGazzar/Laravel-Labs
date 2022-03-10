<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
//use Carbon\Carbon;

class OldPostController extends Controller
{
    function index(){
        $posts = Post::paginate(4);
        return view('posts.index', ["posts"=>$posts]);
    }

    function create(){
        $users = User::all();
        return view('posts.create', ["users"=>$users]);
    }

    function store(){
        request()->validate([
            "title"=>"required|min:3|unique:posts",
            "description"=>"required|min:10"
        ],
        [
           "title.required"=>"Come on! Give your post a proper unique title..",
           "title.unique"=>"Come on! Give your post a proper unique title.."
        ]);

        $data = request()->all();
        $row = new Post();
        $row->title = $data["title"];
        $row->description = $data["description"];
        $row->image = $data["image"];
        //$row->user_id = User::where('name', $data["user_name"])->get()[0]->id;
        $row->user_id = $data["user_id"];
        $row->save();
        return to_route("posts.index");
    }

    function show($post){
        $row = Post::findOrFail($post);
        return view('posts.show', ["row"=>$row]); 
    }

    function edit($post){
        $row = Post::findOrFail($post);
        return view('posts.edit', ["row"=>$row]);
    }

    function update($post){
        $row = Post::findOrFail($post);

        if(request('title') != $row->title){
            request()->validate([
                "title"=>"required|min:3|unique:posts",
                "description"=>"required|min:10"
            ],
            [
               "title.required"=>"Come on! Give your post a proper unique title..",
               "title.unique"=>"Come on! Give your post a proper unique title.."
            ]);
        }
        
        $row->title = request("title");
        $row->description = request("description");
        $row->image = request("image");
        $row->save();
        return to_route("posts.index");
    }

    function destroy($post){
        Post::findOrFail($post)->delete();
        return to_route("posts.index");
    }

    function deleted(){
        $posts = Post::onlyTrashed()->get();
        return view("posts.deleted", ["posts"=>$posts]);
    }

    function restore($post){
        Post::withTrashed()->find($post)->restore();
        return to_route("posts.deleted");
    }
}
