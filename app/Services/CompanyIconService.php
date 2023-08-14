<?php
namespace App\Services;

use App\Repositories\companyIconRepository;

class CompanyIconService
{
    protected $companyIconRepository;

    public function __construct(CompanyIconRepository $companyIconRepository)
    {
      $this->companyIconRepository = $companyIconRepository;
    }
    public function getAllCompanyIcons()
    {
      return $this->companyIconRepository->all();
    }

    public function getCompanyIcon(int $id) {
      return $this->companyIconRepository->get($id);
    }

    public function saveCompanyIcon(array $data, $model)
    {
      return $this->companyIconRepository->save($data, $model);
    }

    public function deleteCompanyIcon($model)
    {
      return $this->companyIconRepository->delete($model);
    }
}