<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestContact;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function getContact()
    {
        return view('contact');
    }

    public function saveContact(RequestContact $requestContact)
    {
        $data = $requestContact->except('_token');
        $data['created_at'] = $data['updated_at'] = now();
        Contact::insert($data);
        return redirect()->back();
    }
}
