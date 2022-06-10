<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        # code
        $posts = \Auth::user()->posts()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

//    show create form
    public function create(){
        # code
        return view('admin.posts.create');
    }



//    store form in db
    public function store(Request $request){
        # code
        $this->validate($request, [
            'title'=>'required|max:70',
            'short_description'=>'required',
            'picture'=>'required|mimes:png,jpg,jpeg,img'
        ]);
        $input = $request->all();

        if ($file = $request->file('picture')){
            $input['picture'] = $file->store('images');
        }

        $post = new Post([
//            'user_id'=>\Auth::user()->id,
            'title'=>$input['title'],
            'slug'=>\Str::of($input['title'])->slug('-'),
            'short_description'=>$input['short_description'],
            'content'=>$input['content'],
            'picture'=>$input['picture']
        ]);

        \Auth::user()->posts()->save($post);
        session()->flash('post-created', 'Post successfully created as you can see!');
        return redirect()->route('post.show.one', $post->slug);
    }



//    display post edit form
    public function edit(Post $post){
        # code
        return view('admin.posts.edit', compact('post'));
    }

//    updating a post
    public function update(Request $request, Post $post){
        # code
        $this->validate($request, [
            'title'=>'required|max:70',
            'short_description'=>'required',
        ]);

        $input = $request->all();
        if ($file = $request->file('picture')){
            $input['picture'] = $file->store('images');
            $post->picture=$input['picture'];
        }
        $post->title=$input['title'];
        $post->slug=\Str::of($input['title'])->slug('-');
        $post->short_description=$input['short_description'];
        $post->content=$input['content'];

        $post->save();
        session()->flash('post-updated', 'Post successfully updated');
        return back();
    }



//    deleting a post
    public function destroy(Post $post){
        # code
        $post->delete();
        session()->flash('post-deleted', 'Post "' . $post->title . '" successfully deleted');
        return back();
    }
}
