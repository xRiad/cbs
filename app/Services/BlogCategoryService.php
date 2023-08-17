<?php
namespace App\Services;

use App\Repositories\BlogCategoryRepository;

class BlogCategoryService
{
    public function __construct(protected BlogCategoryRepository $blogCategoryRepository) {}
}
