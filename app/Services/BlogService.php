<?php
namespace App\Services;

use App\Repositories\BlogRepository;
use App\Http\Requests\BlogRequest;
use App\Models\BlogModel;

class BlogService
{

    public function __construct( protected BlogRepository $blogRepository)
    {
    }
    public function getAllBlogs()
    {
        return $this->blogRepository->all(['category']);
    }

    public function getBlog(int $id) {
      return $this->blogRepository->get($id);
    }

    public function create(BlogRequest $request)
    {
        $data = $request->validated();
        if($request->file('image')) {
          $image = $request->file('image');
          $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
          $data['image'] = $imagePath;
        }
  
        if($request->file('image_detail')) {
          $imageDetail = $request->file('image_detail');
          $imagePath = $this->fileManagerService->saveFile($image, 800, 290, 'images');
          $data['image_detail'] = $imagePath;
        }
        $data['category_id'] = 1;


        return $this->blogRepository->save($data, new BlogModel());
    }

    public function update(BlogRequest $request, BlogModel $model)
    {
        $data = $request->validated();
        if($request->file('image')) {
            $this->fileManagerService->deleteFile($blog->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
            $data['image'] = $imagePath;
        }
        if($request->file('image_detail')) {
            $this->fileManagerService->deleteFile($blog->image_detail);
            $imageDetail = $request->file('image_detail');
            $imagePath = $this->fileManagerService->saveFile($imageDetail, 800, 290, 'images');
            $data['image_detail'] = $imagePath;
        }
        $data['category_id'] = 1;

        return $this->blogRepository->save($data, $model);
    }

    public function deleteBlog($model)
    {
        return $this->blogRepository->delete($model);
    }

}
