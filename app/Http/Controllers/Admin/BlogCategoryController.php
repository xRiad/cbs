<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategoryModel;
use App\Http\Requests\BlogCategoryRequest;
use App\Repositories\BlogCategoryRepository;

class BlogCategoryController extends Controller
{

    public function __construct(protected BlogCategoryRepository $blogCategoryRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = $this->blogCategoryRepository->all();

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
        try {
          $this->blogCategoryRepository->save($request->validated(), new BlogCategoryModel);
          return redirect()->back()->with('success', 'Category has been succsessfully saved');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
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
      $blogCategory = $this->blogCategoryRepository->get($id);
      return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, BlogCategoryModel $blogCategory)
    {
        try {
          $this->blogCategoryRepository->save($request->validated(), $blogCategory);
          return redirect()->back()->with('success', 'Category has been successfully updated.');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategoryModel $blogCategory)
    {
        if($this->blogCategoryRepository->delete($blogCategory)) {
          return redirect()->back()->with('success', 'Category has been successfully deleted.');
        } else {
          return redirect()->back()->with('success', 'Category deletion failed.');
        }
    }
}
