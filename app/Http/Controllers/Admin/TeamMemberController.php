<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileManagerService;
use App\Models\TeamMemberModel;
use App\Http\Requests\TeamMemberRequest;

class TeamMemberController extends Controller
{
    protected $fileManagerService;

    public function __construct(FileManagerService $fileManagerService) {
      $this->fileManagerService = $fileManagerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $teamMembers = TeamMemberModel::all();
      return view('admin.team-members.index', ['teamMembers' => $teamMembers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.team-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamMemberRequest $request)
    {
      $teamMember = new TeamMemberModel;
      $teamMember->title = $request->input('title');
      $teamMember->position = $request->input('position');

      if($request->file('image')) {
        $image = $request->file('image');
        $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
        $teamMember->image = $imagePath;
      }


      if($teamMember->save()) {
        return redirect()->back()->with('success', 'Member has been succsessfully saved');
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
      $teamMember = TeamMemberModel::findOrFail($id);
      return view('admin.team-members.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamMemberRequest $request, int $id)
    {
       $teamMember = TeamMemberModel::findOrFail($id);
       if ($teamMember) {
          $teamMember->title = $request->input('title');
          $teamMember->content = $request->input('content');
          if($request->file('image')) {
            $this->fileManagerService->deleteFile($teamMember->image);
            $image = $request->file('image');
            $imagePath = $this->fileManagerService->saveFile($image, 268, 225, 'images');
            $teamMember->image = $imagePath;
          }
          if ($teamMember->update()) {
            return redirect()->back()->with('success', 'Member has been successfully updated.');
          } else {
              return redirect()->back()->with('failure', 'Failed to update member.');
          }
       } else {
          return redirect()->back()->with('failure', 'Member not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $teamMember = TeamMemberModel::findOrFail($id);

      if($teamMember) {
        if ($teamMember->image) {
          $this->fileManagerService->deleteFile($teamMember->image);
        } 
        if ($teamMember->image_detail) {
          $this->fileManagerService->deleteFile($teamMember->image_detail);
        }

        if($teamMember->delete()) {
          return redirect()->back()->with('success', 'Member has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Member deletion failed.');
        }
      } else {
        return redirect()->back()->with('failure', 'Member does not exist.');
      }
    }
}
