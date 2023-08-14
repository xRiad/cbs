<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogCategoryService;
use App\Models\BlogCategoryModel;
use App\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    protected $blogCategoryService;

    public function __construct(BlogCategoryService $blogCategoryService) {
      $this->blogCategoryService = $blogCategoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = $this->blogCategoryService->getAllBlogCategories();

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
        $data = $request->all();

        if($this->blogCategoryService->saveBlogCategory($data, new BlogCategoryModel)) {
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
      $blogCategory = $this->blogCategoryService->getBlogCategory($id);
      return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, BlogCategoryModel $blogCategory)
    {
      $data = $request->all();

      if ($this->blogCategoryService->saveBlogCategory($data, $blogCategory)) {
        return redirect()->back()->with('success', 'Category has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update category.');
      }     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategoryModel $blogCategory)
    {
        if($this->blogCategoryService->deleteBlogCategory($blogCategory)) {
          return redirect()->back()->with('success', 'Category has been successfully deleted.');
        } else {
          return redirect()->back()->with('success', 'Category deletion failed.');
        }
    }
}
