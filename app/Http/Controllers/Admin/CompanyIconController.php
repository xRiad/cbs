<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyIconModel;
use App\Http\Requests\CompanyIconRequest;
use App\Repositories\CompanyIconRepository;

class CompanyIconController extends Controller
{

    public function __construct(protected CompanyIconRepository $companyIconRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companiesIcons = $this->companyIconRepository->all();

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
        try {
          $this->companyIconRepository->save($request->validated(), new companyIconModel);
          return redirect()->back()->with('success', 'Icon has been succsessfully saved');
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
      $companyIcon = $this->companyIconRepository->get($id);
      return view('admin.companies-icons.edit', compact('companyIcon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyIconRequest $request, CompanyIconModel $companyIcon)
    { 
        try {
          $this->companyIconRepository->save($request->validated(), $companyIcon);
          return redirect()->back()->with('success', 'Icon has been succsessfully updated');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyIconModel $companyIcon)
    {
        try {
          $this->companyIconRepository->delete($companyIcon);
          return redirect()->back()->with('success', 'Icon has been succsessfully deleted');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
