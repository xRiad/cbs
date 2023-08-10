<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyIconModel;
use App\Http\Requests\CompanyIconRequest;

class CompanyIconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companiesIcons = CompanyIconModel::all();

        return view('admin.companies-icons.index', compact('companiesIcons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies-icons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyIconRequest $request)
    {
        $companyIcon = new CompanyIconModel;

        $companyIcon->name = $request->input('name');
        
        if($companyIcon->save()) {
          return redirect()->back()->with('success', 'Icon has been succsessfully saved');
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
      $companyIcon = CompanyIconModel::findOrFail($id);
      return view('admin.companies-icons.edit', compact('companyIcon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyIconRequest $request, int $id)
    {
       $companyIcon = CompanyIconModel::findOrFail($id);
       if ($companyIcon) {
          $companyIcon->name = $request->input('name');

          if ($companyIcon->update()) {
            return redirect()->back()->with('success', 'Icon has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update icon.');
          }
       } else {
          return redirect()->back()->with('failure', 'Icon not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $companyIcon = CompanyIconModel::findOrFail($id);

      if($companyIcon) {
        if($companyIcon->delete()) {
          return redirect()->back()->with('success', 'Icon has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Icon deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Icon does not exist.');
      }
    }
}
