<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Models\ContactModel;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService) {
      $this->contactService = $contactService;
    }

    public function edit () {
      $contact = $this->contactService->getFirstContact();
      return view('admin.contact.edit', compact('contact'));
    }

    public function update (ContactRequest $request) {
      $contact = $this->contactService->getFirstContact();
 
      $data = $request->all();
      
      if ($this->contactService->saveContact($data, $contact)) {
        return redirect()->back()->with('success', 'Contact has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update contact.');
      }
    }
}
