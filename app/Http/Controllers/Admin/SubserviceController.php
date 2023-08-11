<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubserviceModel;
use App\Models\ServiceModel;
use App\Http\Requests\SubserviceRequest;

class SubserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subservices = SubserviceModel::with('service')->get();
        return view('admin.subservices.index', compact('subservices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = ServiceModel::all();
        return view('admin.subservices.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubserviceRequest $request)
    {
        $subservice = new SubserviceModel;

        $subservice->name = $request->input('name');
        
        if($subservice->save()) {
          return redirect()->back()->with('success', 'Subservice has been succsessfully saved');
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
      $subservice = SubserviceModel::findOrFail($id);
      $services = ServiceModel::all();
      return view('admin.subservices.edit', compact('subservice', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubserviceRequest $request, int $id)
    {
       $subservice = SubserviceModel::findOrFail($id);
       if ($subservice) {
          $subservice->name = $request->input('name');

          if ($subservice->update()) {
            return redirect()->back()->with('success', 'Subservice has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update subservice.');
          }
       } else {
          return redirect()->back()->with('failure', 'Subservice not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $subservice = SubserviceModel::findOrFail($id);

      if($subservice) {
        if($subservice->delete()) {
          return redirect()->back()->with('success', 'Subservice has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Subservice deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Subservice does not exist.');
      }
    }
}
