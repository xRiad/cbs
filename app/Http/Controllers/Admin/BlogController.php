<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileManagerService;
use App\Services\BlogService;
use App\Services\BlogCategoryService;
use App\Models\BlogModel;
use App\Models\BlogCategoryModel;
use App\Http\Requests\BlogRequest;
use Carbon\Carbon;

class BlogController extends Controller
{
    
    protected $fileManagerService;
    protected $blogService;
    protected $blogCategoryService;

    public function __construct(FileManagerService $fileManagerService, BlogService $blogService, BlogCategoryService $blogCategoryService) {
      $this->fileManagerService = $fileManagerService;
      $this->blogService = $blogService;
      $this->blogCategoryService = $blogCategoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $blogs = $this->blogService->getAllBlogs();
      return view('admin.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = $this->blogCategoryService->getAllBlogCategories();
      return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
      $data = $request->all();
      if($request->file('image')) {
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
        $data['image'] = $imagePath;
      }

      if($request->file('image_detail')) {
        $imageDetail = $request->file('image_detail');
        $imagePath = $this->fileManagerService->saveFile($image, 800, 290, 'images');
        $data['image_detail'] = $imagePath;
      }

      if($this->blogService->saveBlog($data, new BlogModel)) {
        return redirect()->back()->with('success', 'Blog has been succsessfully saved');
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
      $categories = $this->blogCategoryService->getAllBlogCategories();

      $blog = $this->blogService->getBlog($id);
      return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, BlogModel $blog)
    {
      $data = $request->all();

      if($request->file('image')) {
        $this->fileManagerService->deleteFile($blog->image);
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
        $data['image'] = $imagePath;

      }
      if($request->file('image_detail')) {
        $this->fileManagerService->deleteFile($blog->image_detail);
        $imageDetail = $request->file('image_detail');
        $imagePath = $this->fileManagerService->saveFile($imageDetail, 800, 290, 'images');
        $data['image_detail'] = $imagePath;
      }

      if ($this->blogService->saveBlog($data, $blog)) {
        return redirect()->back()->with('success', 'Blog has been successfully updated.');
      } else {
          return redirect()->back()->with('failure', 'Failed to update blog.');
      }
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogModel $blog)
    {
      if ($blog->image) {
        $this->fileManagerService->deleteFile($blog->image);
      } 
      if ($blog->image_detail) {
        $this->fileManagerService->deleteFile($blog->image_detail);
      }

      if($this->blogService->deleteBlog($blog)) {
        return redirect()->back()->with('success', 'Blog has been successfully deleted.');
      } else {
        return redirect()->back()->with('success', 'Blog deletion failed.');
      }
   
    }
}
