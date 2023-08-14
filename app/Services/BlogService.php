<?php
namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function getAllBlogs()
    {
        return $this->blogRepository->all(['category']);
    }

    public function getBlog(int $id) {
      return $this->blogRepository->get($id);
    }

    public function saveBlog(array $data, $model)
    {
        return $this->blogRepository->save($data, $model);
    }

    public function deleteBlog($model)
    {
        return $this->blogRepository->delete($model);
    }

}
