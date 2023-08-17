<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileManagerService;
use App\Models\TeamMemberModel;
use App\Http\Requests\TeamMemberRequest;
use App\Repositories\TeamMemberRepository;
use App\Services\TeamMemberService;

class TeamMemberController extends Controller
{
    public function __construct(protected FileManagerService $fileManagerService,
    protected TeamMemberService $teamMemberService,
    protected TeamMemberRepository $teamMemberRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $teamMembers = $this->teamMemberRepository->all();
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
      try{
        $this->teamMemberService->create($request, new TeamMemberModel) ;
        return redirect()->back()->with('success', 'Member has been succsessfully saved');
      } catch(Exception $e) {
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
      $teamMember = $this->teamMemberRepository->get($id);
      return view('admin.team-members.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamMemberRequest $request, TeamMemberModel $teamMember)
    {
      try{
        $this->teamMemberService->update($request, $teamMember) ;
        return redirect()->back()->with('success', 'Member has been succsessfully updated');
      } catch(Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMemberModel $teamMember)
    {
      try{
        $this->teamMemberService->delete($teamMember) ;
        return redirect()->back()->with('success', 'Member has been succsessfully deleted');
      } catch(Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }
}
