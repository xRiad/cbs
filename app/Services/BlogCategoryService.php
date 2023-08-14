<?php
namespace App\Services;

use App\Repositories\BlogCategoryRepository;

class BlogCategoryService
{
    protected $blogCategoryRepository;

    public function __construct(BlogCategoryRepository $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }
    public function getAllBlogCategories()
    {
        return $this->blogCategoryRepository->all();
    }

    public function getBlogCategory(int $id) {
      return $this->blogCategoryRepository->get($id);
    }

    public function saveBlogCategory(array $data, $model)
    {
        return $this->blogCategoryRepository->save($data, $model);
    }

    public function deleteBlogCategory($model)
    {
        return $this->blogCategoryRepository->delete($model);
    }
}
