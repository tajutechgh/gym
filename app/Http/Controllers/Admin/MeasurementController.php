<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Measurement;

class MeasurementController extends Controller
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
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'body_part' => 'required',
            'immediate_result' => 'required',
            'progress_result' => 'required',

        ]);

        $measurement = new Measurement;

        $measurement->body_part = $request->body_part;
        $measurement->immediate_result = $request->immediate_result;
        $measurement->progress_result = $request->progress_result;
        $measurement->member_id = $request->member_id;

        $measurement->save();

        return redirect()->back()->with('message','Measurement added successfully');
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

            'body_part' => 'required',
            'immediate_result' => 'required',
            'progress_result' => 'required',

        ]);

        $measurement = Measurement::find($id);

        $measurement->body_part = $request->body_part;
        $measurement->immediate_result = $request->immediate_result;
        $measurement->progress_result = $request->progress_result;
        $measurement->member_id = $request->member_id;

        $measurement->save();

        return redirect()->back()->with('message','Measurement updated successfully');
    }

    public function destroy($id)
    {
        Measurement::where('id',$id)->delete();

        return redirect()->back()->with('message','Measurement deleted successfully');
    }
}
