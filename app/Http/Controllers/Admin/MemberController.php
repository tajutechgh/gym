<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Member;
use App\Model\admin\Membership;
use App\Model\admin\User;
use App\Model\admin\Classe;
use App\Model\admin\Group;
use Auth;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->category == 'Trainer') {

            $members = User::find(auth()->id())->members()->latest()->get();

            $expired_membership = Member::whereRaw("MONTH(`end_date`) = MONTH(NOW()) and DAY(`end_date`) = DAY(NOW())")->get();

            return view('admin.member.index',compact('members','expired_membership'));

        }else{

            $members = Member::latest()->get();

            $memberships = Membership::all();

            $users = User::where('category','=','Trainer')->get();

            $classes = Classe::all();

            $groups = Group::all();

            return view('admin.member.index',compact('users','members','classes','groups','memberships'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'email' => 'required|unique:members',
            'phone' => 'required|unique:members|min:10',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'membership_id' => 'required',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {

            $imagename = $request->image->getClientOriginalName();

            $request->image->storeAs('public',$imagename);

            $member = new Member;

            $member->name = $request->name;
            $member->email = $request->email;
            $member->phone = $request->phone;
            $member->dob = $request->dob;
            $member->gender = $request->gender;
            $member->address = $request->address;
            $member->start_date = $request->start_date;
            $member->end_date = $request->end_date;
            $member->membership_id = $request->membership_id;
            $member->user_id = $request->user_id;
            $member->class_id = $request->class_id;
            $member->group_id = $request->group_id;
            $member->image = $imagename;

            $member->save();
        }

        return redirect(route('member.index'))->with('message','Member added successfully');
    }

    public function show($id)
    {
        $member = Member::find($id);

        return view('admin.member.show',compact('member'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'membership_id' => 'required',

        ]);

        $member = Member::find($id);

        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->dob = $request->dob;
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->start_date = $request->start_date;
        $member->end_date = $request->end_date;
        $member->membership_id = $request->membership_id;
        $member->user_id = $request->user_id;
        $member->class_id = $request->class_id;
        $member->group_id = $request->group_id;

        $member->save();

        return redirect(route('member.index'))->with('message','Member updated successfully');
    }

    public function destroy($id)
    {
        Member::where('id',$id)->delete();

        return redirect()->back()->with('message','Member deleted successfully');
    }

    public function measurement($id)
    {
        $measurement = Member::find($id);

        $member_measurements = Member::find($id)->measurements;

        return view('admin.member.measurement',compact('measurement','member_measurements'));
    }

    public function attendance($id)
    {
        $attendance = Member::find($id);

        $member_attendances = Member::find($id)->attendances;

        return view('admin.member.attendance',compact('attendance','member_attendances'));
    }

    public function invoice($id)
    {
        $invoice = Member::find($id);

        $member_invoices = Member::find($id)->invoices;

        return view('admin.member.invoice',compact('invoice','member_invoices'));
    }
}
