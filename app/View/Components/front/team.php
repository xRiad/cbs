<?php

namespace App\View\Components\front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TeamMemberModel;

class team extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $teamMembers = TeamMemberModel::all(); 
        return view('components.front.team', compact('teamMembers'));
    }
}
