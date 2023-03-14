<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Event;
use Calendar;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 
    }

    public function create()
    {
        return view('admin.event');
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',

        ]);

        $event = new Event;

        $event->name=$request->name;
        $event->start_date=$request->start_date;
        $event->end_date=$request->end_date;

        $event->save();

        return redirect(route('event.create'))->with('message','Event added successfully');
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
}
