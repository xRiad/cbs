<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceLetterRequest;
use App\Models\ServiceLetterModel;
use App\Repositories\ServiceLetterRepository;


class ServiceLetterController extends Controller
{
    public function __construct (protected ServiceLetterRepository $serviceLetterRepository) {}
    public function saveLetter (ServiceLetterRequest $request) {
      try {
        $this->serviceLetterRepository->save($request->validated(), new ServiceLetterModel);
        return redirect()->back()->with('success', 'Letter has been succsessfully send');
      } catch (\Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }
}
