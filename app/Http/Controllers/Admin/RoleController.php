<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    public function __construct(protected RoleRepository $roleRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleRepository->all();

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
        try {
          $this->roleRepository->save($request->validated(), new RoleModel);
          return redirect()->back()->with('success', 'Role has been succsessfully saved');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
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
      $role = $this->roleRepository->get($id);
      return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, RoleModel $role)
    {
        try {
          $this->roleRepository->save($request->validated(), $role);
          return redirect()->back()->with('success', 'Role has been succsessfully updated');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleModel $role)
    {
        try {
          $this->roleRepository->delete($role);
          return redirect()->back()->with('success', 'Role has been succsessfully deleted');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
