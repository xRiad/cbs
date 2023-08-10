<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = RoleModel::all();

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
        $role = new RoleModel;

        $role->name = $request->input('name');
        
        if($role->save()) {
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
      $role = RoleModel::findOrFail($id);
      return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, int $id)
    {
       $role = RoleModel::findOrFail($id);
       if ($role) {
          $role->name = $request->input('name');

          if ($role->update()) {
            return redirect()->back()->with('success', 'Role has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update role.');
          }
       } else {
          return redirect()->back()->with('failure', 'Role not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $role = RoleModel::findOrFail($id);

      if($role) {
        if($role->delete()) {
          return redirect()->back()->with('success', 'Role has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Role deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Role does not exist.');
      }
    }
}
