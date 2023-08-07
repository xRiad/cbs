<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TitleContentModel;
use App\Models\ProjectModel;

class PortfolioController extends Controller
{
    public function index () {
      $portfolioPageHeader = TitleContentModel::where('section_id', 10)->firstOrFail();
      $projects = ProjectModel::with('category')->paginate(1);
// dd($portfolioPageHeader);
      return view('front.portfolio.index', compact('portfolioPageHeader', 'projects'));
    }
}
