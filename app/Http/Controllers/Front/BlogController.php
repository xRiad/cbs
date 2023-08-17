<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TitleContentModel;
use App\Models\BlogModel;
use App\Models\ContactModel;
use App\Repositories\BlogRepository;

class BlogController extends Controller
{
  public function __construct(protected BlogRepository $blogRepository) {}
  public function index () {
    $blogs = $this->blogRepository->paginate(1, ['category']);
   
   return view('front.blog.index', compact('blogs'));
  }

  public function detail (string $slug) {
    $blog = $this->blogRepository->findByOrFail('slug', $slug, '=', ['category']);
    $recentBlogs = $this->blogRepository->all(['category'], 'desc', 'id', 'id', '<>', $blog->id, 3);
    $recentBlogs = BlogModel::orderByDesc('id')->with('category')->where('id','<>', $blog->id)->limit(3)->get();
    $contacts = ContactModel::first();
    return view('front.blog.detail', compact('blog', 'recentBlogs', 'contacts'));
  }
}
