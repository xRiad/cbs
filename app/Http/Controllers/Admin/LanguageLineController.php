<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LanguageLineModel;
use App\Repositories\LanguageLineRepository;
use App\Http\Requests\LanguageLineRequest;

class LanguageLineController extends Controller
{
    public function __construct(protected LanguageLineRepository $languageLineRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languageLines = $this->languageLineRepository->all();

        return view('admin.language-lines.index', compact('languageLines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language-lines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageLineRequest $request)
    {
        try {
          $this->languageLineRepository->save($request->validated(), new languageLineModel);
          return redirect()->back()->with('success', 'Translation has been succsessfully saved');
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
      $languageLine = $this->languageLineRepository->get($id);
      return view('admin.language-lines.edit', compact('languageLine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageLineRequest $request, languageLineModel $languageLine)
    {
        try {
          $this->languageLineRepository->save($request->validated(), $languageLine);
          return redirect()->back()->with('success', 'Translation has been succsessfully updated');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(languageLineModel $languageLine)
    {
        try {
          $this->languageLineRepository->delete($languageLine);
          return redirect()->back()->with('success', 'Translation has been succsessfully deleted');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
