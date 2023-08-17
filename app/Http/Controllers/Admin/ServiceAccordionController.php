<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceAccordionModel;
use App\Models\ServiceModel;
use App\Http\Requests\ServiceAccordionRequest;
use App\Repositories\ServiceAccordionRepository;
use App\Repositories\ServiceRepository;

class ServiceAccordionController extends Controller
{
    public function __construct (protected ServiceAccordionRepository $serviceAccordionRepository,
    protected ServiceRepository $serviceRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $serviceAccordions = $this->serviceAccordionRepository->all(['service']);
        return view('admin.services-accordions.index', compact('serviceAccordions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = $this->serviceRepository->all();
        return view('admin.services-accordions.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceAccordionRequest $request)
    {
        try {
          $this->serviceAccordionRepository->save($request->validated(), new ServiceAccordionModel);
          return redirect()->back()->with('success', 'Service accordion has been succsessfully saved');
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
      $serviceAccordion = $this->serviceAccordionRepository->get($id);
      $services = $this->serviceRepository->all();
      return view('admin.services-accordions.edit', compact('serviceAccordion', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceAccordionRequest $request, ServiceAccordionModel $serviceAccordion)
    {
      // dd($serviceAccordion);
        try {
          $this->serviceAccordionRepository->save($request->validated(), $serviceAccordion);
          return redirect()->back()->with('success', 'Service accordion has been succsessfully updated');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceAccordionModel $serviceAccordion)
    {
        try {
          $this->serviceAccordionRepository->delete($serviceAccordion);
          return redirect()->back()->with('success', 'Service accordion has been succsessfully deleted');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
