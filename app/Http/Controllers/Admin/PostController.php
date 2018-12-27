<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class PostController extends Controller
{
    
    public function index()
    {
      $posts = Post::all();
      return view('admin.posts.all', compact('posts'));
    }

    
    public function create()
    {
      $categories = Category::pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
                
        $post = Post::create([
          'title' => $request->title,
          'description' => $request->description,
          'content' => $request->content,
          'category_id' => $request->category_id
        ]);

        return redirect()->route('post.index')->with('message','Post Created Successfully!');
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
      $post = Post::find($id);
      $categories = Category::pluck('name', 'id');
      return view('admin.posts.edit', compact('post', 'categories'));
    }

    
    public function update(Request $request, $id)
    {
      $post = Post::find($id);

      $post->update([
          'title' => $request->title,
          'description' => $request->description,
          'content' => $request->content,
          'category_id' => $request->category_id
      ]);

      return redirect()->route('post.index')->with('message','Post Edited Successfully');
    }




    public function getDelete($id)
    {

      $post = Post::find($id);
      $post->delete();
      return redirect()->route('post.index')->with( 'message','Post Had Been Deleted!');
    }
}
