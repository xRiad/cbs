<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TitleContentModel;
use App\Models\BlogModel;

class BlogController extends Controller
{
  public function index () {
   $blogTitleContent = TitleContentModel::where('section_id', 9)->firstOrFail(); 
   $blogs = BlogModel::with('category')->paginate(1);
   
   return view('front.blog.index', compact('blogTitleContent', 'blogs'));
  }

  public function detail (string $slug) {
    $blog = BlogModel::where('slug', $slug)->with('category')->firstOrFail();
    $recentBlogs = BlogModel::orderByDesc('id')->with('category')->limit(3)->get();

    return view('front.blog.detail', compact('blog', 'recentBlogs'));
  }
}
