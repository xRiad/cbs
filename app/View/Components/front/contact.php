<?php

namespace App\View\Components\front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;

class contact extends Component
{

    public function __construct(protected ContactRepository $contactRepository) {}
    /**
     * Create a new component instance.
     */

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $contacts = $this->contactRepository->first();
        return view('components.front.contact', compact('contacts'));
    }
}
