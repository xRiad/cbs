<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LetterController;
use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\PortfolioController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\ServiceLetterController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\AuthController;

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

Route::get('/services/seo', [ServiceController::class, 'seo'])->name('services.seo');
Route::get('/services/smm', [ServiceController::class, 'smm'])->name('services.smm');
Route::get('/services/google-ads', [ServiceController::class, 'googleAds'])->name('services.google-ads');
Route::get('/services/web', [ServiceController::class, 'web'])->name('services.web');
Route::post('services/letter/save', [ServiceLetterController::class, 'saveLetter'])->name('services.letter.save');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login-check');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.auth'], function () {
  Route::get('/', fn () => view('admin.index'))->name('index');
  Route::get('/logout', [AuthController::class, 'logOut'])->name('logout');
  Route::resource('projects', AdminProjectController::class)->names('projects');
  Route::resource('blogs', AdminBlogController::class)->names('blogs');
});