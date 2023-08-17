<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileManagerService;
use App\Services\ProjectService;
use App\Models\ProjectModel;
use App\Models\ProjectCategoryModel;
use App\Http\Requests\ProjectRequest;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectCategoryRepository;

class ProjectController extends Controller
{
    
    public function __construct(protected FileManagerService $fileManagerService,
    protected ProjectService $projectService,
    protected ProjectRepository $projectRepository,
    protected ProjectCategoryRepository $projectCategoryRepository) {}
    /**
     * Display a listing of the resource.
    */   
    public function index()
    {
      $projects = $this->projectRepository->all();
      return view('admin.portfolio.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = $this->projectCategoryRepository->all();
      return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
      try {
        $this->projectService->create($request); 
        return redirect()->back()->with('success', 'Project has been succsessfully saved');
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
      $categories = $this->projectCategoryRepository->all();
      $project = $this->projectRepository->get($id);
      return view('admin.portfolio.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, ProjectModel $project)
    {
      try {
        $this->projectService->update($request, $project);
        return redirect()->back()->with('success', 'Project has been successfully updated.');
      } catch(Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectModel $project)
    {  
      try {
        $this->projectService->delete($project);
        return redirect()->back()->with('success', 'Project has been successfully deleted.');
      } catch(Exception $e) {
        return redirect()->back()->with('success', 'Project deletion failed.');
      }
    }
}
