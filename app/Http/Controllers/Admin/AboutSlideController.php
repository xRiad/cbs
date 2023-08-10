<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSlideModel;
use App\Http\Requests\AboutSlideRequest;
use App\Services\FileManagerService;

class AboutSlideController extends Controller
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
        $headerSlides = AboutSlideModel::all();

        return view('admin.about-slides.index', compact('headerSlides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about-slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutSlideRequest $request)
    {
        $aboutSlide = new AboutSlideModel;

        $aboutSlide->title = $request->input('title');
        $aboutSlide->content = $request->input('content');


        if($request->file('image')) {
          $image = $request->file('image');
          $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
          $aboutSlide->image = $imagePath;
        }

        if($aboutSlide->save()) {
          return redirect()->back()->with('success', 'Slide has been succsessfully saved');
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
      $aboutSlide = AboutSlideModel::findOrFail($id);
      return view('admin.about-slides.edit', compact('aboutSlide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutSlideRequest $request, int $id)
    {
       $aboutSlide = AboutSlideModel::findOrFail($id);
       if ($aboutSlide) {
          $aboutSlide->title = $request->input('title');
          $aboutSlide->content = $request->input('content');

          if($request->file('image')) {
            $this->fileManagerService->deleteFile($aboutSlide->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
            $aboutSlide->image = $imagePath;
          }

          if ($aboutSlide->update()) {
            return redirect()->back()->with('success', 'Slide has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update slide.');
          }
       } else {
          return redirect()->back()->with('failure', 'Slide not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $aboutSlide = AboutSlideModel::findOrFail($id);

      if($aboutSlide) {
        if ($aboutSlide->image) {
          $this->fileManagerService->deleteFile($aboutSlide->image);
        } 

        if($aboutSlide->delete()) {
          return redirect()->back()->with('success', 'Slide has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Slide deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Slide does not exist.');
      }
    }
}
