<?php

namespace App\View\Components\front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ContactModel;
use App\Models\ServiceModel;
use App\Repositories\ContactRepository;
use App\Repositories\ServiceRepository;


class footer extends Component
{

    public function __construct(protected ContactRepository $contactRepository,
    protected ServiceRepository $serviceRepository) {}
    /**
     * Create a new component instance.
     */

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $contacts = $this->contactRepository->first(); 
        $services = $this->serviceRepository->all();
        return view('components.front.footer', compact('contacts', 'services'));
    }
}
