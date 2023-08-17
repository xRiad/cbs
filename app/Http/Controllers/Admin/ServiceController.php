<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceModel;
use App\Http\Requests\ServiceRequest;
use App\Services\FileManagerService;
use App\Services\ServiceService;
use App\Repositories\ServiceRepository;

class ServiceController extends Controller
{
    public function __construct(protected FileManagerService $fileManagerService,
    protected ServiceService $serviceService,
    protected ServiceRepository $serviceRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceRepository->all();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
      try {
        $this->serviceService->create($request); 
        return redirect()->back()->with('success', 'Service has been succsessfully saved');
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
      $service = $this->serviceRepository->get($id);
      return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, ServiceModel $service)
    {
      try {
        $this->serviceService->update($request, $service); 
        return redirect()->back()->with('success', 'Service has been succsessfully updated');
      } catch(Exception $e) { 
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceModel $service)
    {
      try {
        $this->serviceService->delete($service);
        return redirect()->back()->with('success', 'Service has been successfully deleted.');
      } catch(Exception $e) {
        return redirect()->back()->with('success', 'Service deletion failed.');
      }
    }
}
