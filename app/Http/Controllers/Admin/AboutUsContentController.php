<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsContentModel;
use App\Repositories\AboutUsContentRepository;
use App\Services\AboutUsContentService;
use App\Http\Requests\AboutUsContentRequest;


class AboutUsContentController extends Controller
{
    public function __construct(protected AboutUsContentRepository $aboutUsContentRepository,
    protected AboutUsContentService $aboutUsContentService) {}

    public function edit()
    {
      $aboutUsContent = $this->aboutUsContentRepository->first();
      return view('admin.about-us-content.edit', compact('aboutUsContent'));
    }

    public function update(AboutUsContentRequest $request)
    {
        $aboutUsContent = $this->aboutUsContentRepository->first();
        try {
          $this->aboutUsContentService->update($request, $aboutUsContent);
          return redirect()->back()->with('success', 'Content has been succsessfully updated');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
