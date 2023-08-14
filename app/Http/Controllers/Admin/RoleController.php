<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Services\RoleService;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService) {
      $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->getAllRoles();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->all();
        
        if($this->roleService->saveRole($data, new RoleModel)) {
          return redirect()->back()->with('success', 'Role has been succsessfully saved');
        } else {
          return redirect()->back()->with('failure', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
      $role = $this->roleService->getRole($id);
      return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, RoleModel $role)
    {
      $data = $request->all();
      if ($this->roleService->saveRole($data, $role)) {
        return redirect()->back()->with('success', 'Role has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update role.');
      }
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleModel $role)
    {
      if($this->roleService->deleteRole($role)) {
        return redirect()->back()->with('success', 'Role has been successfully deleted.');
      } else {
        return redirect()->back()->with('success', 'Role deletion failed.');
      }
    }
}
