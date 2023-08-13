<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceModel;
use App\Http\Requests\ServiceRequest;
use App\Services\FileManagerService;

class ServiceController extends Controller
{
    protected $fileManagerService;

    public function __construct(FileManagerService $fileManagerService) {
      $this->fileManagerService = $fileManagerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceModel::all();

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
        $service = new ServiceModel;

        $service->name = $request->input('name');
        $service->title = $request->input('title');
        $service->content = $request->input('content');
        $service->question = $request->input('question');
        $service->icon = $request->input('icon');
        $service->has_letters = (bool) $request->has('has_letters');
        $service->is_main = (bool) $request->has('is_main');


        if($request->file('image')) {
          $image = $request->file('image');
          $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
          $service->image = $imagePath;
        }

        if($service->save()) {
          return redirect()->back()->with('success', 'service has been succsessfully saved');
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
      $service = ServiceModel::findOrFail($id);
      return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, int $id)
    {
       $service = ServiceModel::findOrFail($id);
      // dd($request);
       if ($service) {
            $service->name = $request->input('name');
            $service->title = $request->input('title');
            $service->content = $request->input('content');
            $service->question = $request->input('question');
            $service->icon = $request->input('icon');
            $service->has_letters = (bool) $request->has('has_letters');
            $service->is_main = (bool) $request->has('is_main');

          if($request->file('image')) {
            $this->fileManagerService->deleteFile($service->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
            $service->image = $imagePath;
          }

          if ($service->update()) {
            return redirect()->back()->with('success', 'Service has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update service.');
          }
       } else {
          return redirect()->back()->with('failure', 'Service not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $service = ServiceModel::findOrFail($id);

      if($service) {
        if ($service->image) {
          $this->fileManagerService->deleteFile($service->image);
        } 

        if($service->delete()) {
          return redirect()->back()->with('success', 'Service has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Service deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Service does not exist.');
      }
    }
}
