<?php
namespace App\Services;

use App\Repositories\ProjectCategoryRepository;

class ProjectCategoryService
{
    protected $projectCategoryRepository;

    public function __construct(ProjectCategoryRepository $projectCategoryRepository)
    {
        $this->projectCategoryRepository = $projectCategoryRepository;
    }
    public function getAllProjectCategories()
    {
        return $this->projectCategoryRepository->all();
    }

    public function getProjectCategory(int $id) {
      return $this->projectCategoryRepository->get($id);
    }

    public function saveProjectCategory(array $data, $model)
    {
        return $this->projectCategoryRepository->save($data, $model);
    }

    public function deleteProjectCategory($model)
    {
        return $this->projectCategoryRepository->delete($model);
    }
}
