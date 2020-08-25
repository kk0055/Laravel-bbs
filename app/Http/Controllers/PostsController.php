<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['comments'])->orderBy('created_at','desc')->paginate(20);

        return view('posts.index',['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'cover_image' => 'image|nullable|max:1999'
        ],
        [
           
            'title.max' => '50文字までだよ'
        ]);

        //heroku以外
    //     if($request->hasFile('cover_image')){
          
    //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
    //     $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME); 
    //     $extension = $request->file('cover_image')->getClientOriginalExtension();

    //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
    //     $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

    // }else {
    //     $fileNameToStore= 'noimage.jpg';
    // }
        // $post = new Post;
        // $post->title =$request->input('title');
        // $post->body =$request->input('body');
        // $post->cover_image =$fileNameToStore;
               
        // $post->save();

  
        $post = new Post;
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $uploadImg =  $post->cover_image =$request->file('cover_image');;
        $path = Storage::disk('s3')->putFile('/posts', $uploadImg, 'public');
        $post->cover_image = Storage::disk('s3')->url($path);
        
        $post->save();

        // Post::create($params);

        return redirect()->route('top');
    }
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'max:50',
            'body' => 'max:2000',

        ]);

      
        
        $post = Post::findOrFail($post_id);
      
        $post->fill($params)->save();
    
        return redirect()->route('posts.show', ['post' => $post]);
    }
    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
     
        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
}
