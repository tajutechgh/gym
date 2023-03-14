<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Trainer;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $trainers = Trainer::latest()->get();

        return view('admin.trainer.index',compact('trainers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'email' => 'required|unique:trainers',
            'phone' => 'required|unique:trainers|min:10',
            'role' => 'required',
            'gender' => 'required',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {

            $imagename = $request->image->getClientOriginalName();

            $request->image->storeAs('public',$imagename);

            $trainer = new Trainer;

            $trainer->name = $request->name;
            $trainer->email = $request->email;
            $trainer->phone = $request->phone;
            $trainer->role = $request->role;
            $trainer->gender = $request->gender;
            $trainer->image = $imagename;

            $trainer->save();
        }

        return redirect(route('trainer.index'))->with('message','Trainer added successfully');
    }

    public function show($id)
    {
        $members = Trainer::find($id)->members;

        return view('admin.trainer.show',compact('members'));
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
            'role' => 'required',
            'gender' => 'required',

        ]);

        $trainer = Trainer::find($id);

        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->phone = $request->phone;
        $trainer->role = $request->role;
        $trainer->gender = $request->gender;

        $trainer->save();

        return redirect(route('trainer.index'))->with('message','Trainer updated successfully');
    }

    public function destroy($id)
    {
        Trainer::where('id',$id)->delete();

        return redirect()->back()->with('message','Trainer deleted successfully');
    }
}
