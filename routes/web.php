<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LetterController;
use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\PortfolioController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\ServiceLetterController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AboutSlideController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\CompanyIconController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ServiceAccordionController;
use App\Http\Controllers\Admin\SubserviceController;
use App\Http\Controllers\Admin\LetterController as AdminLetterController;
use App\Http\Controllers\Admin\ServiceLetterController as AdminServiceLetterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\LanguageLineController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/letter/save', [LetterController::class, 'saveLetter'])->name('letter.save');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/detail/{slug}', [BlogController::class, 'detail'])->name('blog.detail');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/by-category', [PortfolioController::class, 'byCategory'])->name('portfolio.by-category');
Route::get('/portfolio/detail/{slug}', [PortfolioController::class, 'detail'])->name('portfolio.detail');

Route::get('/service/{slug}', [ServiceController::class, 'index'])->name('service');

Route::post('services/letter/save', [ServiceLetterController::class, 'saveLetter'])->name('services.letter.save');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login-check');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.auth'], function () {
  Route::get('/', fn () => view('admin.index'))->name('index');
  Route::get('/logout', [AuthController::class, 'logOut'])->name('logout');
  Route::resource('projects', AdminProjectController::class)->names('projects');
  Route::resource('blogs', AdminBlogController::class)->names('blogs');
  Route::resource('about-slides', AboutSlideController::class)->names('about-slides');
  Route::resource('cards', CardController::class)->names('cards');
  Route::resource('services', AdminServiceController::class)->names('services');
  Route::resource('subservices', SubserviceController::class)->names('subservices');
  Route::resource('roles', RoleController::class)->names('roles');
  Route::resource('project-categories', ProjectCategoryController::class)->names('project-categories');
  Route::resource('blog-categories', BlogCategoryController::class)->names('blog-categories');
  Route::resource('company-icons', CompanyIconController::class)->names('company-icons');
  Route::resource('team-members', TeamMemberController::class)->names('team-members');
  Route::resource('service-accordions', ServiceAccordionController::class)->names('service-accordions');
  Route::resource('letters', AdminLetterController::class)->names('letters');
  Route::resource('service-letters', AdminServiceLetterController::class)->names('service-letters');
  Route::resource('admins', AdminController::class)->names('admins');
  Route::resource('language-lines', LanguageLineController::class)->names('language-lines');
  Route::get('contact/edit', [AdminContactController::class, 'edit'])->name('contact.edit');
  Route::put('contact/update', [AdminContactController::class, 'update'])->name('contact.update');
});