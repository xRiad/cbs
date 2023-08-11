<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceAccordionModel;
use App\Models\ServiceModel;
use App\Http\Requests\ServiceAccordionRequest;

class ServiceAccordionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceAccordions = ServiceAccordionModel::with('service')->get();
        return view('admin.services-accordions.index', compact('serviceAccordions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = ServiceModel::all();
        return view('admin.services-accordions.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $serviceAccordion = new ServiceAccordionModel;

        $serviceAccordion->name = $request->input('name');
        $serviceAccordion->content = $request->input('content');
        $serviceAccordion->service_id = $request->input('service_id');
        
        if($serviceAccordion->save()) {
          return redirect()->back()->with('success', 'Service has been succsessfully saved');
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
      $serviceAccordion = ServiceAccordionModel::findOrFail($id);
      return view('admin.services-accordions.edit', compact('serviceAccordion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, int $id)
    {
       $serviceAccordion = ServiceAccordionModel::findOrFail($id);
       if ($serviceAccordion) {
          $serviceAccordion->name = $request->input('name');
          $serviceAccordion->content = $request->input('content');
          $serviceAccordion->service_id = $request->input('service_id');

          if ($serviceAccordion->update()) {
            return redirect()->back()->with('success', 'Service has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update role.');
          }
       } else {
          return redirect()->back()->with('failure', 'Role not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $serviceAccordion = ServiceAccordionModel::findOrFail($id);

      if($serviceAccordion) {
        if($serviceAccordion->delete()) {
          return redirect()->back()->with('success', 'Service has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Service deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Service does not exist.');
      }
    }
}
