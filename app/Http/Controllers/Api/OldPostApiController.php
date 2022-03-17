<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class OldPostApiController extends Controller
{
    function index(){
        return Post::all();
    }

    function show($post){
        return Post::findOrFail($post);
    }

    function store(){
        Post::create(request()->all());
        return "Created Successfully";
    }

    function update($post){
        Post::findOrFail($post)->update(request()->all());
        return "Updated Successfully";
    }

    function destroy($post){
        Post::findOrFail($post)->delete();
        return "Deleted Successfully";
    }
}
