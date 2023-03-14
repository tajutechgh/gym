<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Role;
use App\Model\admin\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::latest()->get();

        $roles = Role::all();

        return view('admin.user.index',compact('roles','users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|string|max:50',

            'username' => 'required|string|max:50',

            'email' => 'required|string|email|max:255',

            'phone' => 'required|unique:users|min:10',

            'gender' => 'required',

            'category' => 'required',

            'image' => 'required',

            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($request->hasFile('image')) {

            $imagename = $request->image->getClientOriginalName();

            $request->image->storeAs('public',$imagename);

            $request->status? : $request['status']=0;

            $request['password'] = bcrypt($request->password);

            $user = User::create([
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'category'=>$request->category,
                'password'=>$request->password,
                'status'=>$request->status,
                'image'=>$imagename,
            ]);

            $user->roles()->sync($request->role);
        }

        return redirect(route('user.index'))->with('message','Staff added successfully');
    }

    public function show($id)
    {
        $members = User::find($id)->members;

        return view('admin.user.show',compact('members'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name' => 'required|string|max:50',

            'username' => 'required|string|max:50',

            'email' => 'required|string|email|max:255',

            'phone' => 'required|min:10',

            'gender' => 'required',

            'category' => 'required',
        ]);

        $request->status? : $request['status']=0;

        $user = User::where('id',$id)->update($request->except('_token','_method','role'));

        User::find($id)->roles()->sync($request->role);

        return redirect(route('user.index'))->with('message','Staff updated successfully');
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();

        return redirect()->back()->with('message','Staff deleted successfully');
    }
}
