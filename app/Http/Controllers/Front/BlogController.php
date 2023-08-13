<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TitleContentModel;
use App\Models\BlogModel;
use App\Models\ContactModel;

class BlogController extends Controller
{
  public function index () {
   $blogs = BlogModel::with('category')->paginate(1);
   
   return view('front.blog.index', compact('blogs'));
  }

  public function detail (string $slug) {
    $blog = BlogModel::where('slug', $slug)->with('category')->firstOrFail();
    $recentBlogs = BlogModel::orderByDesc('id')->with('category')->where('id','<>', $blog->id)->limit(3)->get();
    $contacts = ContactModel::first();
    return view('front.blog.detail', compact('blog', 'recentBlogs', 'contacts'));
  }
}
