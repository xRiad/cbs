<?php
namespace App\Services;

use App\Repositories\BlogRepository;
use App\Http\Requests\BlogRequest;
use App\Models\BlogModel;
use App\Services\FileManagerService;

class BlogService
{

    public function __construct(protected FileManagerService $fileManagerService,
    protected BlogRepository $blogRepository) {}

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
        // $data['category_id'] = 1;


        return $this->blogRepository->save($data, new BlogModel());
    }

    public function update(BlogRequest $request, BlogModel $model)
    {
        $data = $request->validated();
        if($request->file('image')) {
            $this->fileManagerService->deleteFile($model->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
            $data['image'] = $imagePath;
        }
        if($request->file('image_detail')) {
            $this->fileManagerService->deleteFile($model->image_detail);
            $imageDetail = $request->file('image_detail');
            $imagePath = $this->fileManagerService->saveFile($imageDetail, 800, 290, 'images');
            $data['image_detail'] = $imagePath;
        }
        // $data['category_id'] = 1;

        return $this->blogRepository->save($data, $model);
    }

    public function delete($model)
    {
      if ($model->image) {
        $this->fileManagerService->deleteFile($model->image);
      } 
      if ($model->image_detail) {
        $this->fileManagerService->deleteFile($model->image_detail);
      }

      return $this->blogRepository->delete($model);
    }

}
