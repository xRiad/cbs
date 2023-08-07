<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceLetterRequest;
use App\Models\ServiceLetterModel;

class ServiceLetterController extends Controller
{
    public function saveLetter (ServiceLetterRequest $request) {
      $newLetter = new ServiceLetterModel;
      
      $newLetter->service_id = $request->input('service_id');
      $newLetter->name = $request->input('name');
      $newLetter->phone_or_email = $request->input('phone_or_email');
      $newLetter->website_url = $request->input('website_url');
      
      $newLetter->save();

      return redirect()->back();
    }
}
