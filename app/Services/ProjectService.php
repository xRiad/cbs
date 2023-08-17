<?php
namespace App\Services;

use App\Repositories\ProjectRepository;
use App\Http\Requests\ProjectRequest;
use App\Models\ProjectModel;
use App\Services\FileManagerService;

class ProjectService
{

    public function __construct(protected FileManagerService $fileManagerService, protected ProjectRepository $projectRepository) {}

    public function create (ProjectRequest $request) {
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

      return $this->projectRepository->save($data, new ProjectModel());
    }

    public function update (ProjectRequest $request, ProjectModel $model) {
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

      return $this->projectRepository->save($data, $model);
    }

    
    public function delete($model)
    {
        if ($model->image) {
          $this->fileManagerService->deleteFile($model->image);
        } 
        if ($model->image_detail) {
          $this->fileManagerService->deleteFile($model->image_detail);
        }
        return $this->projectRepository->delete($model);
    }
}
