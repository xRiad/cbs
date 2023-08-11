<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LetterModel;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = LetterModel::all();

        return view('admin.letters.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $letter = LetterModel::findOrFail($id);

      if($letter) {
        if($letter->delete()) {
          return redirect()->back()->with('success', 'Letter has been successfully deleted.');
        } else {
          return redirect()->back()->with('success', 'Letter deletion failed.');
        }
      } else {
        return redirect()->back()->with('failure', 'Letter does not exist.');
      }
    }
}
