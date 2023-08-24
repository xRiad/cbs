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
      $otherProjects = $this->projectRepository->randomLimitWhere(4, ['category'], 'slug', '<>', $slug); 

      return view('front.portfolio.detail', compact('project', 'otherProjects'));
    }

    public function byCategory () {
      $categoryId = request('categoryId');
    
      if($categoryId === 'all') {
        $projects = $this->projectRepository->limit(4, [], 'asc', 'id');
      } else {
        $projects = $this->projectRepository->limitWhere(4, [], 'asc', 'id', 'category_id', '=', $categoryId);
      }
      $view = View::make('front.partials.project_cards', ['projects' => $projects])->render();
      
      return response()->json([
        'success' => true,
        'html' => $view
      ]);
    }
}
