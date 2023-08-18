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
use App\Repositories\ContactRepository;
use App\Repositories\AboutSlideRepository;
use App\Repositories\CardRepository;
use App\Repositories\CompanyIconRepository;


class HomeController extends Controller
{
  
  public function __construct(protected ContactRepository $contactRepository,
   protected AboutSlideRepository $aboutSlideRepository,
   protected CardRepository $cardRepository,
   protected CompanyIconRepository $companyIconRepository) {}
    public function index () {
      $slides = $this->aboutSlideRepository->all();
      $cards = $this->cardRepository->all();
      $companiesIcons = $this->companyIconRepository->all();
      $contacts = $this->contactRepository->first(); 
      $projects = ProjectModel::orderByDesc('id')->limit(10)->get();
      return view('front.home', compact('slides', 'cards', 'companiesIcons', 'contacts', 'projects'));
    }
}
