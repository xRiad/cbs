<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Repositories\AdminRepository;
use App\Services\AdminService;

class AdminController extends Controller
{
    public function __construct(protected AdminRepository $adminRepository,
    protected AdminService $adminService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = $this->adminRepository->all();

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
        try {
          $this->adminService->create($request, new User);
          return redirect()->back()->with('success', 'Admin has been succsessfully created');
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
      $admin = $this->adminRepository->get($id);
      return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, User $admin)
    {
        try {
          $this->adminService->update($request, $admin);
          return redirect()->back()->with('success', 'Admin has been succsessfully updated');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        try {
          $this->adminRepository->delete($admin);
          return redirect()->back()->with('success', 'Admin has been succsessfully deleted');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
