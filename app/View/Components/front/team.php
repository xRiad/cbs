<?php

namespace App\View\Components\front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TeamMemberModel;
use App\Repositories\TeamMemberRepository;

class team extends Component
{
    public function __construct(protected TeamMemberRepository $teamMemberRepository){}
    /**
     * Create a new component instance.
     */
    


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $teamMembers = $this->teamMemberRepository->all(); 
        return view('components.front.team', compact('teamMembers'));
    }
}
