<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSlideModel;
use App\Models\TitleContentModel;
use App\Models\CardModel;
use App\Models\CompanyIconModel;
use App\Models\ContactModel;
use App\Models\ProjectModel;

class HomeController extends Controller
{
    public function index () {
      $slides = AboutSlideModel::all();
      $titlesContents = TitleContentModel::all();
      $cards = CardModel::all();
      $companiesIcons = CompanyIconModel::all();
      $contacts = ContactModel::firstOrFail(); 
      $projects = ProjectModel::orderByDesc('id')->limit(10)->get();

      return view('front.home', compact('slides', 'titlesContents', 'cards', 'companiesIcons', 'contacts', 'projects'));
    }
}
