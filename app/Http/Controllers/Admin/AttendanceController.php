<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\admin\Attendance;
use App\Model\admin\Classe;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = Classe::all();

        return view('admin.attendance.index',compact('classes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attendance = new Attendance;

        $attendance->class_name = $request->class_name;
        $attendance->class_id = $request->class_id;
        $attendance->member_id = $request->member_id;
        $attendance->register = $request->register;

        $attendance->save();

        return redirect()->back()->with('message','Attendance marked successfully');
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
        //
    }

    public function destroy($id)
    {
        //
    }

    public function searchviewAttendance()
    {
        $classes = Classe::all();

        $class = Input::get('class');

        $startdate = Input::get('startdate');

        $enddate = Input::get('enddate');

        $attendance = Attendance::where('class_name', '=', $class)

                    ->whereBetween('created_at', [$startdate,$enddate])
                    
                    ->get();

        if (count($attendance) > 0) {

            return view('admin.attendance.index',compact('classes'))->withDetails($attendance)->withQuery($class,$startdate,
                $enddate);
        }

        return view('admin.attendance.index',compact('classes'))->withMessage('No attendance available!');
    }
}
