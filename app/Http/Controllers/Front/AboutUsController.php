<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TitleContentModel;
use App\Models\AboutUsContentModel;
use App\Repositories\AboutUsContentRepository;

class AboutUsController extends Controller
{
    public function __construct(protected AboutUsContentRepository $aboutUsContentRepository){}

    public function index () {
      $aboutUsContent = $this->aboutUsContentRepository->first();  
      return view('front.about-us', compact('aboutUsContent'));
    }
}
