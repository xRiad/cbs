<?php
namespace App\Services;

use App\Repositories\aboutSlideRepository;
use App\Http\Requests\AboutSlideRequest;
use App\Models\AboutSlideModel;
use App\Services\FileManagerService;

class AboutSlideService
{

    public function __construct(protected AboutSlideRepository $aboutSlideRepository,
    protected FileManagerService $fileManagerService) {}

    public function create (AboutSlideRequest $request) {
      $data = $request->validated();

      if($request->file('image')) {
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
        $data['image'] = $imagePath;
      }

      return $this->aboutSlideRepository->save($data, new AboutSlideModel());
    }

    public function update(AboutSlideRequest $request, AboutSlideModel $model) {
      $data = $request->validated();

      if($request->file('image')) {
        $this->fileManagerService->deleteFile($model->image);
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
        $data['image'] = $imagePath;
      }

      return $this->aboutSlideRepository->save($data, $model);
    }

    public function delete($model)
    {
        if ($model->image) {
          $this->fileManagerService->deleteFile($model->image);
        } 
        return $this->aboutSlideRepository->delete($model);
    }
}