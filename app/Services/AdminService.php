<?php
namespace App\Services;

use App\Repositories\AdminRepository;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminService
{

    public function __construct(protected AdminRepository $adminRepository) {}

    public function create(AdminRequest $request)
    {
      $data = $request->validated();
      $data['password'] = Hash::make($data['password']); 

      return $this->adminRepository->save($data, new User());
    }

    public function update(AdminRequest $request, User $model)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); 

        return $this->adminRepository->save($data, $model);
    }
}
