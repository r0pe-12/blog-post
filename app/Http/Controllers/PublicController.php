<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
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
        $posts = Post::orderBy('published_at', 'desc')->paginate(5);
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
        $input = $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'
        ]);
        $data = [
            'name'=>$input['name'],
            'title'=>'Blog-Post',
            'content'=>$input['message'],
            'email'=>$input['email'],
            'phone'=>$input['phone']
        ];
        \Mail::send('mail', $data, function ($message) use ($data) {
           $message->subject('Blog_Post')->from($data['email'], $data['name'])->to('r0pe@protonmail.com', 'Petar');
        });
    }

}
