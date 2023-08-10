<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategoryModel;
use App\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = BlogCategoryModel::all();

        return view('admin.blog-categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request)
    {
        $blogCategory = new BlogCategoryModel;

        $blogCategory->name = $request->input('name');
        
        if($blogCategory->save()) {
          return redirect()->back()->with('success', 'Category has been succsessfully saved');
        } else {
          return redirect()->back()->with('failure', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
      $blogCategory = BlogCategoryModel::findOrFail($id);
      return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, int $id)
    {
       $blogCategory = BlogCategoryModel::findOrFail($id);
       if ($blogCategory) {
          $blogCategory->name = $request->input('name');

          if ($blogCategory->update()) {
            return redirect()->back()->with('success', 'Category has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update category.');
          }
       } else {
          return redirect()->back()->with('failure', 'Category not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $blogCategory = BlogCategoryModel::findOrFail($id);

      if($blogCategory) {
        if($blogCategory->delete()) {
          return redirect()->back()->with('success', 'Category has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Category deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Category does not exist.');
      }
    }
}
