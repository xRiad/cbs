<?php
namespace App\Services;

use App\Repositories\serviceRepository;
use App\Http\Requests\serviceRequest;
use App\Models\serviceModel;
use App\Services\FileManagerService;

class serviceService
{

    public function __construct(protected serviceRepository $serviceRepository,
    protected FileManagerService $fileManagerService) {}

    public function create (serviceRequest $request) {
      $data = $request->validated();
      
      $data['has_letters'] = $request->has('has_letters');
      $data['is_main'] = $request->has('is_main');

      if($request->file('image')) {
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
        $service->image = $imagePath;
      }

      return $this->serviceRepository->save($data, new serviceModel());
    }

    public function update(serviceRequest $request, serviceModel $model) {
      $data = $request->validated();

      $data['has_letters'] = $request->has('has_letters');
      $data['is_main'] = $request->has('is_main');

      if($request->file('image')) {
        $this->fileManagerService->deleteFile($model->image);
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 730, 330, 'images');
        $data['image'] = $imagePath;
      }

      return $this->serviceRepository->save($data, $model);
    }

    public function delete($model)
    {
        if ($model->image) {
          $this->fileManagerService->deleteFile($model->image);
        } 
        return $this->serviceRepository->delete($model);
    }
}