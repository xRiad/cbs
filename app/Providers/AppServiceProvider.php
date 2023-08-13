<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactModel; 
use App\Models\ServiceModel; 
use App\Models\TeamMemberModel; 
use App\Models\ProjectCategoryModel;
use App\Services\FileManagerService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->singleton(FileManagerService::class, function ($app) {
        return new FileManagerService();
      });    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      app()->setLocale('az');
      View::composer('components.front.header', function ($view) {
        $contacts = ContactModel::firstOrFail(); 
        $services = ServiceModel::with('subservices')->get();
        $view->with(compact('contacts', 'services'));
      });
      View::composer('components.front.team', function ($view) {
        $teamMembers = TeamMemberModel::all(); 
        $view->with(compact('teamMembers'));
      });
      View::composer('components.front.footer', function ($view) {
        $contacts = ContactModel::firstOrFail(); 
        $services = ServiceModel::all();
        $view->with(compact('contacts', 'services'));
      });
      View::composer('components.front.portfolio', function ($view) {
        $projectCategories = ProjectCategoryModel::all();
        $view->with(compact('projectCategories'));
      });
      View::composer('components.front.contact', function ($view) {
        $contacts = ContactModel::firstOrFail();
        $view->with(compact('contacts'));
      });
    }
}
