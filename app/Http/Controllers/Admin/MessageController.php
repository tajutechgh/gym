<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\admin\Message;
use App\Model\admin\Member;
use App\Model\user\Contact;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::latest()->get();

        $countmessages = Message::count();

        $countcontacts = Contact::count();

        return view('admin.message.index',compact('countmessages','contacts','countcontacts'));
    }

    public function create()
    {
        $members = Member::all();

        $countmessages = Message::count();

        $countcontacts = Contact::count();

        return view('admin.message.create',compact('members','countmessages','countcontacts'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            
            'message'=>'required',
        ]);

        $data = Input::get();

        for($i = 0; $i < count($data['member_id']); $i++) {

            $message = new Message();

            $message->member_id = $data['member_id'][$i];
            $message->message = $request->message;

            $message->save();
        }

        // member sms 
        $membermessage = $request['message'];
        $membercontact = Member::where('id', $request['member_id'])->value('phone');;

        $phone = $membercontact;
        $message = $membermessage;
        $key = "wlHHppH5g7tzDz0XpM9JlDVEd";
        $msg = urlencode($message);
        $sender_id = "Don-Gym";
        
        $url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";

        $result=file_get_contents($url);

        return redirect(route('message.create'))->with('message','Message send successfully');
    }

    public function show($id)
    {
        $message = Message::find($id);

        $countmessages = Message::count();

        $countcontacts = Contact::count();

        return view('admin.message.show',compact('message','countmessages','countcontacts'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Message::where('id',$id)->delete();

        return redirect()->back()->with('message','Message deleted successfully');
    }

    public function findContact(Request $request)
    {
        $contact = Member::select('phone')->where('id',$request->id)->first();

        return response()->json($contact);
    }

    public function sent()
    {
        $messages = Message::latest()->get();

        $countmessages = Message::count();

        $countcontacts = Contact::count();

        return view('admin.message.sent',compact('messages','countmessages','countcontacts'));
    }

    public function inbox($id)
    {
        $contact = Contact::find($id);

        $countmessages = Message::count();

        $countcontacts = Contact::count();

        return view('admin.message.inboxdetails',compact('contact','countmessages','countcontacts'));
    }

    public function delete($id)
    {
        Contact::where('id',$id)->delete();

        return redirect()->back()->with('message','Message deleted successfully');
    }
}
