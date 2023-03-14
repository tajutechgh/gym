<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Group;
use App\Model\admin\Member;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $groups = Group::latest()->get();

        return view('admin.group.index',compact('groups'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',

        ]);

        $group = new Group;

        $group->name = $request->name;

        $group->save();

        return redirect(route('group.index'))->with('message','Group added successfully');
    }

    public function show($id)
    {
        $members = Group::find($id)->members;

        return view('admin.group.show',compact('members'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name' => 'required',

        ]);

        $group = Group::find($id);

        $group->name = $request->name;

        $group->save();

        return redirect(route('group.index'))->with('message','Group updated successfully');
    }

    public function destroy($id)
    {
        Group::where('id',$id)->delete();

        return redirect()->back()->with('message','Group deleted successfully');
    }
}
