<?php
namespace App\Services;

use App\Repositories\aboutUsContentRepository;
use App\Http\Requests\BlogRequest;
use App\Models\AboutUsContentModel;
use App\Services\FileManagerService;
use App\Http\Requests\AboutUsContentRequest;

class AboutUsContentService
{
    public function __construct(protected FileManagerService $fileManagerService,
    protected aboutUsContentRepository $aboutUsContentRepository) {}

    public function update(AboutUsContentRequest $request, AboutUsContentModel $model)
    {
        $data = $request->validated();
        if($request->file('image')) {
            $this->fileManagerService->deleteFile($model->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 440, 730, 'images');
            $data['image'] = $imagePath;
        }

        return $this->aboutUsContentRepository->save($data, $model);
    }

    public function delete($model)
    {
      if ($model->image) {
        $this->fileManagerService->deleteFile($model->image);
      } 

      return $this->aboutUsContentRepository->delete($model);
    }

}
