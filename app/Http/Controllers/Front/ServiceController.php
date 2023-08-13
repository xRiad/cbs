<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceHeaderModel;
use App\Models\ServiceAccordionModel;
use App\Models\ServiceModel;

class ServiceController extends Controller
{
  public function index ($slug) {
    $service = ServiceModel::where('slug', $slug)->firstOrFail();
    // dd($service);
    $accordions = ServiceAccordionModel::where('service_id', $service->id)->get();

    return view('front.service', compact('service', 'accordions'));
  }
}
