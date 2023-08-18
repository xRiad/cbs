<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\TitleContentModel;
use App\Models\ProjectModel;
use App\Models\ProjectCategoryModel;
use App\Repositories\ProjectRepository;


class PortfolioController extends Controller
{

  public function __construct(protected ProjectRepository $projectRepository){}
    public function index () {
      $projects = $this->projectRepository->paginate(1, ['category']);
      return view('front.portfolio.index', compact('projects'));
    }

    public function detail (string $slug) {
      $project = $this->projectRepository->findBy('slug', $slug, '=', ['roles']);
      $otherProjects = ProjectModel::inRandomOrder()->with('category')->where('slug', '<>', $slug)->limit(4)->get();

      return view('front.portfolio.detail', compact('project', 'otherProjects'));
    }

    public function byCategory () {
      $categoryId = request('categoryId');
    
      if($categoryId === 'all') {
        $projects = ProjectModel::limit(4)->get();
      } else {
        $projects = ProjectModel::where('category_id', $categoryId)->limit(4)->get();
      }
      $view = View::make('front.partials.project_cards', ['projects' => $projects])->render();
      
      return response()->json([
        'success' => true,
        'html' => $view
      ]);
    }
}
