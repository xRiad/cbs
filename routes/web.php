<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.home');
});
Route::get('/about-us', function () {
  return view('front.about-us');
});
Route::get('/blog', function () {
  return view('front.blog.index');
});
Route::get('/blog/detail', function () {
  return view('front.blog.detail');
});
Route::get('/portfolio', function () {
  return view('front.portfolio.index');
});
Route::get('/portfolio/detail', function () {
  return view('front.portfolio.detail');
});
Route::get('/services/seo', function () {
  return view('front.services.seo');
});
Route::get('/services/smm', function () {
  return view('front.services.smm');
});
Route::get('/services/google-ads', function () {
  return view('front.services.google-ads');
});
Route::get('/services/web', function () {
  return view('front.services.web');
});