<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    
    public function index()
    {
      $categories = Category::all();
      return view('admin.categories.all', compact('categories'));
    }

    
    public function create()
    {
        return view('admin.categories.create');
    }

    
    public function store(CategoryRequest $request)
    {   
        Category::create([
          'name' => $request->name
        ]);
        return redirect()->route('category.index')->with('message','Category Created Successfully');
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
      $category = Category::find($id);
      return view('admin.categories.edit', compact('category'));
    }

    
    public function update(Request $request, $id)
    {
      $category = Category::find($id);
      
      $category->update([
          'name' => $request->name
      ]);

      return redirect()->route('category.index')->with('message','Category Edited Successfully');
    }

    
    public function destroy($id)
    {

    }


    public function getDelete($id)
    {

      $category = Category::find($id);
      $category->posts()->delete();
      $category->delete();
      return redirect()->route('category.index')->with( 'message','Category Deleted Successfully');
    }
}
