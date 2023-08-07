<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TitleContentModel;
use App\Models\AboutUsContentModel;

class AboutUsController extends Controller
{
    public function index () {
      $blogTitleContent = TitleContentModel::where('section_id', '8')->firstOrFail();
      $aboutUsContent = AboutUsContentModel::firstOrFail();  

      return view('front.about-us', compact('blogTitleContent', 'aboutUsContent'));
    }
}
