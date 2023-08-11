<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function edit () {
      $contact = ContactModel::firstOrFail();
      return view('admin.contact.edit', compact('contact'));
    }

    public function update (ContactRequest $request) {
      
      $contact = ContactModel::firstOrFail();
 
      $contact->adress = $request->input('adress');
      $contact->phone = $request->input('phone');
      $contact->mail = $request->input('mail');
      $contact->whatsapp = $request->input('whatsapp');
      $contact->instagram = $request->input('instagram');
      $contact->facebook = $request->input('facebook');
      $contact->linkedin = $request->input('linkedin');
      $contact->twitter = $request->input('twitter');

      if ($contact->update()) {
        return redirect()->back()->with('success', 'Contact has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update contact.');
      }
    }
}
