<?php
namespace App\Services;

use App\Repositories\TeamMemberRepository;
use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMemberModel;
use App\Services\FileManagerService;

class TeamMemberService
{

    public function __construct(protected FileManagerService $fileManagerService,
    protected TeamMemberRepository $teamMemberRepository) {}


    public function create(TeamMemberRequest $request)
    {
        $data = $request->validated();
        if($request->file('image')) {
          $image = $request->file('image');
          $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
          $data['image'] = $imagePath;
        }
        return $this->teamMemberRepository->save($data, new TeamMemberModel());
    }

    public function update(TeamMemberRequest $request, TeamMemberModel $model)
    {
        $data = $request->validated();
        if($request->file('image')) {
            $this->fileManagerService->deleteFile($model->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
            $data['image'] = $imagePath;
        }

        return $this->teamMemberRepository->save($data, $model);
    }

    public function delete($model)
    {
      if ($model->image) {
        $this->fileManagerService->deleteFile($model->image);
      } 

      return $this->teamMemberRepository->delete($model);
    }

}
