<?php

namespace App\View\Components\front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ContactModel;
use App\Models\ServiceModel;


class header extends Component
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
        $contacts = ContactModel::first(); 
        $services = ServiceModel::with('subservices')->get();
        return view('components.front.header', compact('contacts', 'services'));
    }
}
