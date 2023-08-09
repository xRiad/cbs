<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileManagerService;
use App\Models\ProjectModel;
use App\Models\ProjectCategoryModel;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
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
      $projects = ProjectModel::with('category')->get();
      return view('admin.portfolio.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = ProjectCategoryModel::all();
      return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
      $project = new ProjectModel;
      $project->name = $request->input('name');
      $project->slug = $request->input('slug');
      $project->phrase = $request->input('phrase');
      $project->description = $request->input('description');
      $project->category_id = $request->input('category');

      $image = $request->file('image');
      $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
      $project->image = $imagePath;

      $imageDetail = $request->file('image_detail');
      $imagePath = $this->fileManagerService->saveFile($image, 800, 290, 'images');
      $project->image_detail = $imagePath;

      if($project->save()) {
        return redirect()->back()->with('success', 'Project has been succsessfully saved');
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
      $categories = ProjectCategoryModel::all();
      $project = ProjectModel::findOrFail($id);
      return view('admin.portfolio.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, int $id)
    {
       $project = ProjectModel::findOrFail($id);
       if ($project) {
          $project->name = $request->input('name');
          $project->slug = $request->input('slug');
          $project->phrase = $request->input('phrase');
          $project->description = $request->input('description');
          $project->category_id = $request->input('category');

          if($request->file('image')) {
            $this->fileManagerService->deleteFile($project->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
            $project->image = $imagePath;
          }
          if($request->file('image_detail')) {
            $this->fileManagerService->deleteFile($project->image_detail);
            $imageDetail = $request->file('image_detail');
            $imagePath = $this->fileManagerService->saveFile($imageDetail, 800, 290, 'images');
            $project->image_detail = $imagePath;
          }
          if ($project->update()) {
            return redirect()->back()->with('success', 'Project has been successfully updated.');
          } else {
              return redirect()->back()->with('failure', 'Failed to update project.');
          }
       } else {
          return redirect()->back()->with('failure', 'Project not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $project = ProjectModel::findOrFail($id);

      if($project) {
        if ($project->image) {
          $this->fileManagerService->deleteFile($project->image);
        } 
        if ($project->image_detail) {
          $this->fileManagerService->deleteFile($project->image_detail);
        }

        if($project->delete()) {
          return redirect()->back()->with('success', 'Project has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Project deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Project does not exist.');
      }
    }
}
