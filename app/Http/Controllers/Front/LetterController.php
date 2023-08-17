<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LetterModel;
use App\Http\Requests\LetterRequest;
use App\Repositories\letterRepository;

class LetterController extends Controller
{
    public function __construct(protected LetterRepository $letterRepository) {}
    public function saveLetter (LetterRequest $request) {
      try {
        $this->letterRepository->save($request->validated(), new LetterModel);
        return redirect()->back()->with('success', 'Letter has been succsessfully saved');
      } catch (\Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }
}
