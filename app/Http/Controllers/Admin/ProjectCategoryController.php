<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCategoryModel;
use App\Http\Requests\ProjectCategoryRequest;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectCategories = ProjectCategoryModel::all();

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
        $projectCategory = new ProjectCategoryModel;

        $projectCategory->name = $request->input('name');
        
        if($projectCategory->save()) {
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
      $projectCategory = ProjectCategoryModel::findOrFail($id);
      return view('admin.project-categories.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectCategoryRequest $request, int $id)
    {
       $projectCategory = ProjectCategoryModel::findOrFail($id);
       if ($projectCategory) {
          $projectCategory->name = $request->input('name');

          if ($projectCategory->update()) {
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
      $projectCategory = ProjectCategoryModel::findOrFail($id);

      if($projectCategory) {
        if($projectCategory->delete()) {
          return redirect()->back()->with('success', 'Category has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Category deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Category does not exist.');
      }
    }
}
