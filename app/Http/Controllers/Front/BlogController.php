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
}
