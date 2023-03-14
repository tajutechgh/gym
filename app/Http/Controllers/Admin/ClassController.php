<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Classe;
use App\Model\admin\User;
use App\Model\admin\Days;
use App\Model\admin\Member;
use Auth;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->category == 'Trainer') {
            
            $classes = User::find(auth()->id())->classes()->latest()->get();

            return view('admin.class.index',compact('classes'));

        }else{

            $classes = Classe::latest()->get();

            $users = User::where('category','=','Trainer')->get();

            $days = Days::all();

            return view('admin.class.index',compact('classes','users','days'));
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
            'user_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        if ($request->hasFile('image')) {

            $imagename = $request->image->getClientOriginalName();

            $request->image->storeAs('public',$imagename);

            $class = new Classe;

            $class->name = $request->name;
            $class->user_id = $request->user_id;
            $class->start_time = $request->start_time;
            $class->end_time = $request->end_time;
            $class->image = $imagename;

            $class->save();

            $class->days()->sync($request->days);
        }

        return redirect(route('class.index'))->with('message','Class added successfully');
    }

    public function show($id)
    {
        $class = Classe::find($id);

        $members = Classe::find($id)->members;

        return view('admin.class.show',compact('members','class'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name' => 'required',
            'user_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        $class = Classe::find($id);

        $class->name = $request->name;
        $class->user_id = $request->user_id;
        $class->start_time = $request->start_time;
        $class->end_time = $request->end_time;

        $class->save();

        $class->days()->sync($request->days);

        return redirect(route('class.index'))->with('message','Class updated successfully');
    }

    public function destroy($id)
    {
        Classe::where('id',$id)->delete();

        return redirect()->back()->with('message','Class deleted successfully');
    }

    public function schedule()
    {
        $classes = Classe::all();

        return view('admin.class.schedule',compact('classes'));
    }
}
