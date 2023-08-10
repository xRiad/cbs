<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileManagerService;
use App\Models\BlogModel;
use App\Models\BlogCategoryModel;
use App\Http\Requests\BlogRequest;
use Carbon\Carbon;

class BlogController extends Controller
{
    
    protected $fileManagerService;

    public function __construct(FileManagerService $fileManagerService) {
      $this->fileManagerService = $fileManagerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $blogs = BlogModel::with('category')->get();
      return view('admin.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = BlogCategoryModel::all();
      return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
      // dd($request);
      $blog = new BlogModel;
      $blog->title = $request->input('title');
      $blog->slug = $request->input('slug');
      $blog->content = $request->input('content');
      $blog->category_id = $request->input('category');
      $today = Carbon::now();  
      $formattedDate = $today->format('d F Y');
      $blog->created_at = $formattedDate;

      if($request->file('image')) {
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
        $blog->image = $imagePath;
      }


      if($request->file('image_detail')) {
        $imageDetail = $request->file('image_detail');
        $imagePath = $this->fileManagerService->saveFile($image, 800, 290, 'images');
        $blog->image_detail = $imagePath;
      }
      if($blog->save()) {
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
      $categories = BlogCategoryModel::all();
      $blog = BlogModel::findOrFail($id);
      return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, int $id)
    {
       $blog = BlogModel::findOrFail($id);
       if ($blog) {
          $blog->title = $request->input('title');
          $blog->slug = $request->input('slug');
          $blog->content = $request->input('content');
          $blog->category_id = $request->input('category');
          if($request->file('image')) {
            $this->fileManagerService->deleteFile($blog->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
            $blog->image = $imagePath;
          }
          if($request->file('image_detail')) {
            $this->fileManagerService->deleteFile($blog->image_detail);
            $imageDetail = $request->file('image_detail');
            $imagePath = $this->fileManagerService->saveFile($imageDetail, 800, 290, 'images');
            $blog->image_detail = $imagePath;
          }
          if ($blog->update()) {
            return redirect()->back()->with('success', 'Blog has been successfully updated.');
          } else {
              return redirect()->back()->with('failure', 'Failed to update blog.');
          }
       } else {
          return redirect()->back()->with('failure', 'Blog not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $blog = BlogModel::findOrFail($id);

      if($blog) {
        if ($blog->image) {
          $this->fileManagerService->deleteFile($blog->image);
        } 
        if ($blog->image_detail) {
          $this->fileManagerService->deleteFile($blog->image_detail);
        }

        if($blog->delete()) {
          return redirect()->back()->with('success', 'Blog has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Blog deletion failed.');
        }
      } else {
        return redirect()->back()->with('failure', 'Blog does not exist.');
      }
    }
}
