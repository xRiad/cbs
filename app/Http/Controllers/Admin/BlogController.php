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
use App\Repositories\BlogRepository;
use App\Repositories\BlogCategoryRepository;
class BlogController extends Controller
{


    public function __construct(FileManagerService $fileManagerService, 
    protected BlogService $blogService,
    protected BlogCategoryService $blogCategoryService,
    protected BlogRepository $blogRepository,
    protected BlogCategoryRepository $blogCategoryRepository
     ) {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $blogs = $this->blogRepository->all(['category']);
      return view('admin.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = $this->blogCategoryRepository->all();
      return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
      try{
        $this->blogService->create($request, new BlogModel) ;
        return redirect()->back()->with('success', 'Blog has been succsessfully saved');
      } catch(Exception $e) {
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
      $categories = $this->blogCategoryRepository->all();
      $blog = $this->blogRepository->get($id);
      return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, BlogModel $blog)
    {
      try {
        $this->blogService->update($request, $blog);
        return redirect()->back()->with('success', 'Blog has been successfully updated.');
      } catch(Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogModel $blog)
    {
      try {
        $this->blogService->delete($blog);
        return redirect()->back()->with('success', 'Blog has been successfully deleted.');
      } catch(Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }
}
