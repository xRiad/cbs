<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AboutSlideService;
use App\Models\AboutSlideModel;
use App\Http\Requests\AboutSlideRequest;
use App\Services\FileManagerService;

class AboutSlideController extends Controller
{
    protected $fileManagerService;
    protected $aboutSlideService;

    public function __construct(FileManagerService $fileManagerService, AboutSlideService $aboutSlideService) {
      $this->fileManagerService = $fileManagerService;
      $this->aboutSlideService = $aboutSlideService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $aboutSlides = $this->aboutSlideService->getAllAboutSlides();

      return view('admin.about-slides.index', compact('aboutSlides'));
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
      $data = $request->all();
    
      if($request->file('image')) {
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
        $data['image'] = $imagePath;
      }

      if($this->aboutSlideService->saveAboutSlide($data, new AboutSlideModel)) {
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
      $aboutSlide = $this->aboutSlideService->getAboutSlide($id);
      return view('admin.about-slides.edit', compact('aboutSlide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutSlideRequest $request, AboutSlideModel $aboutSlide)
    {
      $data = $request->all();

      if($request->file('image')) {
        $this->fileManagerService->deleteFile($aboutSlide->image);
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
        $data['image'] = $imagePath;
      }

      if ($this->aboutSlideService->saveAboutSlide($data, $aboutSlide)) {
        return redirect()->back()->with('success', 'Slide has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update slide.');
      } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutSlideModel $aboutSlide)
    {
      if ($aboutSlide->image) {
        $this->fileManagerService->deleteFile($aboutSlide->image);
      } 

      if($this->aboutSlideService->deleteAboutSlide($aboutSlide)) {
        return redirect()->back()->with('success', 'Slide has been successfully deleted.');
      } else {
        return redirect()->back()->with('success', 'Slide deletion failed.');
      }
    }
}
