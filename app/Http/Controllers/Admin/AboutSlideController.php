<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AboutSlideService;
use App\Models\AboutSlideModel;
use App\Http\Requests\AboutSlideRequest;
use App\Repositories\AboutSlideRepository;

class AboutSlideController extends Controller
{

    public function __construct(protected FileManagerService $fileManagerService,
    protected AboutSlideService $aboutSlideService,
    protected AboutSlideRepository $aboutSlideRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $aboutSlides = $this->aboutSlideRepository->all();

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
      try {
        $this->aboutSlideService->create($request); 
        return redirect()->back()->with('success', 'Slide has been succsessfully saved');
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
      $aboutSlide = $this->aboutSlideRepository->get($id);
      return view('admin.about-slides.edit', compact('aboutSlide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutSlideRequest $request, AboutSlideModel $aboutSlide)
    {
      try {
        $this->aboutSlideService->update($request, $aboutSlide);
        return redirect()->back()->with('success', 'Slide has been successfully updated.');
      } catch(Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutSlideModel $aboutSlide)
    {
      try {
        $this->aboutSlideService->delete($aboutSlide);
        return redirect()->back()->with('success', 'Slide has been successfully deleted.');
      } catch(Exception $e) {
        return redirect()->back()->with('success', 'Slide deletion failed.');
      }
    }
}
