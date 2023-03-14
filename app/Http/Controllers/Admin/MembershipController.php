<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Membership;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $memberships = Membership::latest()->get();

        return view('admin.membership.index',compact('memberships'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'days' => 'required',
            'price' => 'required',
            'instalment_plan' => 'required',

        ]);

        $membership = new Membership;

        $membership->name = $request->name;
        $membership->days = $request->days;
        $membership->price = $request->price;
        $membership->instalment_plan = $request->instalment_plan;

        $membership->save();

        return redirect(route('membership.index'))->with('message','Membership added successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name' => 'required',
            'days' => 'required',
            'price' => 'required',
            'instalment_plan' => 'required',

        ]);

        $membership = Membership::find($id);

        $membership->name = $request->name;
        $membership->days = $request->days;
        $membership->price = $request->price;
        $membership->instalment_plan = $request->instalment_plan;

        $membership->save();

        return redirect(route('membership.index'))->with('message','Membership updated successfully');
    }

    public function destroy($id)
    {
        Membership::where('id',$id)->delete();

        return redirect()->back()->with('message','Membership deleted successfully');
    }
}
