<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubserviceModel;
use App\Models\ServiceModel;
use App\Http\Requests\SubserviceRequest;
use App\Repositories\SubserviceRepository;
use App\Repositories\ServiceRepository;

class SubserviceController extends Controller
{
    public function __construct (protected SubserviceRepository $subserviceRepository,
    protected ServiceRepository $serviceRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subservices = $this->subserviceRepository->all(['service']);
        return view('admin.subservices.index', compact('subservices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = $this->serviceRepository->all();
        return view('admin.subservices.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubserviceRequest $request)
    {
      try {
        $this->subserviceRepository->save($request->validated(), new SubserviceModel()); 
        return redirect()->back()->with('success', 'Subservice has been succsessfully saved');
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
      $subservice = $this->subserviceRepository->get($id);
      $services =$this->serviceRepository->all();
      return view('admin.subservices.edit', compact('subservice', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubserviceRequest $request, SubserviceModel $subservice)
    {
      try {
        $this->subserviceRepository->save($request->validated(), $subservice); 
        return redirect()->back()->with('success', 'Subservice has been succsessfully updated');
      } catch(Exception $e) { 
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubserviceModel $subservice)
    {
      try {
        $this->subserviceRepository->delete($subservice); 
        return redirect()->back()->with('success', 'Subservice has been succsessfully deleted');
      } catch(Exception $e) { 
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }
}
