<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminRequest;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::all();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $admin = new User;

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        
        if($admin->save()) {
          return redirect()->back()->with('success', 'Admin has been succsessfully saved');
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
      $admin = User::findOrFail($id);
      return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, int $id)
    {
       $admin = User::findOrFail($id);
       if ($admin) {
          $admin->name = $request->input('name');
          $admin->email = $request->input('name');
          $admin->password = Hash::make($request->input('password'));

          if ($admin->update()) {
            return redirect()->back()->with('success', 'Admin has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update admin.');
          }
       } else {
          return redirect()->back()->with('failure', 'Admin not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $admin = User::findOrFail($id);

      if($admin) {
        if($admin->delete()) {
          return redirect()->back()->with('success', 'Admin has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Admin deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Admin does not exist.');
      }
    }
}
