<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceHeaderModel;
use App\Models\ServiceContentModel;
use App\Models\ServiceAccordionModel;

class ServiceController extends Controller
{
   public function seo () {
      $header = ServiceHeaderModel::where('service_id', 1)->firstOrFail();
      $content = ServiceContentModel::where('service_id', 1)->firstOrFail();
      $accordions = ServiceAccordionModel::where('service_id', 1)->get();

      return view('front.services.seo', compact('header', 'content', 'accordions'));
   }
    
   public function smm () {
      $header = ServiceHeaderModel::where('service_id', 2)->firstOrFail();
      $content = ServiceContentModel::where('service_id', 2)->firstOrFail();
      $accordions = ServiceAccordionModel::where('service_id', 2)->get();

      return view('front.services.smm', compact('header', 'content', 'accordions'));
   }

   public function googleAds () {
      $header = ServiceHeaderModel::where('service_id', 3)->firstOrFail();
      $content = ServiceContentModel::where('service_id', 3)->firstOrFail();
      $accordions = ServiceAccordionModel::where('service_id', 3)->get();

      return view('front.services.google-ads', compact('header', 'content', 'accordions'));
   }

   public function web () {
      $header = ServiceHeaderModel::where('service_id', 4)->firstOrFail();
      $content = ServiceContentModel::where('service_id', 4)->firstOrFail();
      $accordions = ServiceAccordionModel::where('service_id', 4)->get();

      return view('front.services.web', compact('header', 'content', 'accordions'));
   }
}
