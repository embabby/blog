<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;


class BlogController extends Controller
{


	public function getIndex(Request $request){
      $categories = Category::all();
      $posts = Post::paginate(12);
      
      return view('blog.index',compact('categories','posts'));
     
    }


















}