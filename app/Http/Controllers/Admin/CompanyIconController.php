<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyIconModel;
use App\Services\CompanyIconService;
use App\Http\Requests\CompanyIconRequest;

class CompanyIconController extends Controller
{
    protected $companyIconService;

    public function __construct(CompanyIconService $companyIconService) {
      $this->companyIconService = $companyIconService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companiesIcons = $this->companyIconService->getAllCompanyIcons();

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
      $data = $request->all();
      
      if($this->companyIconService->saveCompanyIcon($data, new CompanyIconModel)) {
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
      $companyIcon = $this->companyIconService->getCompanyIcon($id);
      return view('admin.companies-icons.edit', compact('companyIcon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyIconRequest $request, CompanyIconModel $companyIcon)
    { 
      $data = $request->all();
      if ($this->companyIconService->saveCompanyIcon($data, $companyIcon)) {
        return redirect()->back()->with('success', 'Icon has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update icon.');
      }     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyIconModel $companyIcon)
    {
      if($this->companyIconService->deleteCompanyIcon($companyIcon)) {
        return redirect()->back()->with('success', 'Icon has been successfully deleted.');
      } else {
        return redirect()->back()->with('success', 'Icon deletion failed.');
      }
    }
}
