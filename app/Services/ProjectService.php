<?php
namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    public function getAllProjects()
    {
        return $this->projectRepository->all(['category']);
    }

    public function getProject(int $id) {
      return $this->projectRepository->get($id);
    }

    public function saveProject(array $data, $model)
    {
        return $this->projectRepository->save($data, $model);
    }

    public function deleteProject($model)
    {
        return $this->projectRepository->delete($model);
    }

}
