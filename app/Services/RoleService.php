<?php
namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
      $this->roleRepository = $roleRepository;
    }
    public function getAllRoles()
    {
      return $this->roleRepository->all();
    }

    public function getRole(int $id) {
      return $this->roleRepository->get($id);
    }
    public function saveRole(array $data, $model)
    {
        return $this->roleRepository->save($data, $model);
    }
    public function deleteRole($model)
    {
      return $this->roleRepository->delete($model);
    }
}