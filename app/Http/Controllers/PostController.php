<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
//    display 4 latest posts
    public function home(){
        # code
        $posts = Post::orderBy('published_at', 'desc')->take(4)->get();
        return view('posts.index', compact('posts'));
    }



//    display all posts
    public function showAll(){
        # code
        $posts = Post::latest()->paginate(5);
        return view('posts.allPosts', compact('posts'));
    }



//    display one post
    public function showOne($slug){
        # code
        $post = Post::whereSlug($slug)->first();
        return view('posts.post', compact('post'));
    }



//    sending mail
    public function mail(Request $request){
        # code
        dd($request->all());
    }
}
