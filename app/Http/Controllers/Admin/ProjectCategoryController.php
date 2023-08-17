<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCategoryModel;
use App\Http\Requests\ProjectCategoryRequest;
use App\Repositories\ProjectCategoryRepository;

class ProjectCategoryController extends Controller
{
    public function __construct(protected ProjectCategoryRepository $projectCategoryRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectCategories = $this->projectCategoryRepository->all();

        return view('admin.project-categories.index', compact('projectCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCategoryRequest $request)
    {
        try {
          $this->projectCategoryRepository->save($request->validated(), new ProjectCategoryModel);
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
      $projectCategory = $this->projectCategoryRepository->get($id);
      return view('admin.project-categories.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectCategoryRequest $request, ProjectCategoryModel $projectCategory)
    {
        try { 
          $this->projectCategoryRepository->save($request->validated(), $projectCategory);
          return redirect()->back()->with('success', 'Category has been successfully updated.');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategoryModel $projectCategory)
    {
        if($this->projectCategoryRepository->delete($projectCategory)) {
          return redirect()->back()->with('success', 'Category has been successfully deleted.');
        } else {
          return redirect()->back()->with('success', 'Category deletion failed.');
        }
    }
}
