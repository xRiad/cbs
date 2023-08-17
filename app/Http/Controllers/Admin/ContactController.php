<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct(protected ContactRepository $contactRepository) {}

    public function edit () {
      $contact = $this->contactRepository->first();
      return view('admin.contact.edit', compact('contact'));
    }

    public function update (ContactRequest $request) {
      $contact = $this->contactRepository->first();
      try {
        $this->contactRepository->save($request->validated(), $contact);
        return redirect()->back()->with('success', 'Contact has been succsessfully updated');
      } catch (\Exception $e) {
        return redirect()->back()->with('failure', $e->getMessage());
      }
    }
}
