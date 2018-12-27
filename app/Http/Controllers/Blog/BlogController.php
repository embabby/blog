<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Post;
use App\Category;


class BlogController extends Controller
{


	public function getIndex(){
      $categories = Category::all();
      $posts = Post::paginate(12);
      
      return view('blog.index',compact('categories','posts'));
     
    }



    public function getBlog($id){
      $post = Post::find($id);
      return view('blog.post',compact('post'));
     
    }


    public function categoryPosts($id){
		$categories = Category::all();
		$selected_category = Category::find($id);
      	$posts = Post::where('category_id', $id)->paginate(12);
      return view('blog.index2',compact('categories','posts','selected_category'));
     
    }




















}