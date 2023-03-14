<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('user.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'phone' => 'required|min:10',
            'message' => 'required',
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->message = $request->message;

        $contact->save();

        return redirect(route('contact'))->with('message','Message sent successfully, thank you for contacting us!!!');
    }
}
