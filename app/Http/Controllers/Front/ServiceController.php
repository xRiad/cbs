<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceHeaderModel;
use App\Models\ServiceAccordionModel;
use App\Models\ServiceModel;
use App\Repositories\ServiceRepository;
use App\Repositories\ServiceAccordionRepository;

class ServiceController extends Controller
{
  public function __construct(protected ServiceRepository $serviceRepository,
  protected ServiceAccordionRepository $serviceAccordionRepository){}

  public function index ($slug) {
    $service = $this->serviceRepository->findByOrFail('slug', $slug);
    $accordions = $this->serviceAccordionRepository->allWhere([], 'asc', 'id', 'service_id', $service->id);

    return view('front.service', compact('service', 'accordions'));
  }
}
