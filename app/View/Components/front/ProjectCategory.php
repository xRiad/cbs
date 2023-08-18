<?php

namespace App\View\Components\front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ProjectCategoryModel;
use App\Repositories\ProjectCategoryRepository;

class ProjectCategory extends Component
{
    public function __construct(protected ProjectCategoryRepository $projectCategoryRepository){}
    /**
     * Create a new component instance.
     */

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $projectCategories = $this->projectCategoryRepository->all();
        return view('components.front.project-category', compact('projectCategories'));
    }
}
