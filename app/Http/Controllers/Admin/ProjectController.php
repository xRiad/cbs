<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileManagerService;
use App\Services\ProjectService;
use App\Services\ProjectCategoryService;
use App\Models\ProjectModel;
use App\Models\ProjectCategoryModel;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    
    protected $fileManagerService;
    protected $projectService;
    protected $projectCategoryService;

    public function __construct(FileManagerService $fileManagerService, ProjectService $projectService, ProjectCategoryService $projectCategoryService) {
      $this->fileManagerService = $fileManagerService;
      $this->projectCategoryService = $projectCategoryService;
      $this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
    */   
    public function index()
    {
      $projects = $this->projectService->getAllProjects();
      return view('admin.portfolio.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = $this->projectCategoryService->getAllProjectCategories();
      return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request, ProjectModel $project)
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

      if($this->projectService->saveProject($data, $project)) {
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
      $categories = $this->projectCategoryService->getAllProjectCategories();
      $project = $this->projectService->getProject($id);
      return view('admin.portfolio.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, ProjectModel $project)
    {
      $data = $request->all();

      if($request->file('image')) {
        $this->fileManagerService->deleteFile($project->image);
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
        $data['image'] = $imagePath;
      }

      if($request->file('image_detail')) {
        $this->fileManagerService->deleteFile($project->image_detail);
        $imageDetail = $request->file('image_detail');
        $imagePath = $this->fileManagerService->saveFile($imageDetail, 800, 290, 'images');
        $data['image_detail'] = $imagePath;
      }

      if ($this->projectService->saveProject($data, $project)) {
        return redirect()->back()->with('success', 'Project has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update project.');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectModel $project)
    {
        if ($project->image) {
          $this->fileManagerService->deleteFile($project->image);
        } 
        if ($project->image_detail) {
          $this->fileManagerService->deleteFile($project->image_detail);
        }

        if($this->projectService->deleteProject($project)) {
          return redirect()->back()->with('success', 'Project has been successfully deleted.');
        } else {
          return redirect()->back()->with('success', 'Project deletion failed.');
        }
    }
}
