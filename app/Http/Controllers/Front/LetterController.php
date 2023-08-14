<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LetterModel;
use App\Http\Requests\LetterRequest;

class LetterController extends Controller
{
    public function saveLetter (LetterRequest $request) {
      $newLetter = new LetterModel;
      $newLetter->name = $request->input('name');
      $newLetter->phone = $request->input('phone');
      $newLetter->mail = $request->input('mail');
      $newLetter->message = $request->input('message');

      $newLetter->save();

      return redirect()->back();
    }
}
