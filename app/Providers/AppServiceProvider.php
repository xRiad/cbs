<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactModel; 
use App\Models\ServiceModel; 
use App\Models\TeamMemberModel; 
use App\Models\FooterTextModel; 
use App\Models\TitleContentModel; 
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
      View::composer('components.front.header', function ($view) {
        $contacts = ContactModel::firstOrFail(); 
        $services = ServiceModel::with('subservices')->get();
        $view->with(compact('contacts', 'services'));
      });
      View::composer('components.front.team', function ($view) {
        $teamMembers = TeamMemberModel::all(); 
        $teamContent = TitleContentModel::where('section_id', 6)->firstOrFail();
        $view->with(compact('teamMembers', 'teamContent'));
      });
      View::composer('components.front.footer', function ($view) {
        $footerText = FooterTextModel::firstOrFail();
        $view->with(compact('footerText'));
      });
      View::composer('components.front.portfolio', function ($view) {
        $projectCategories = ProjectCategoryModel::all();
        $view->with(compact('projectCategories'));
      });
    }
}
