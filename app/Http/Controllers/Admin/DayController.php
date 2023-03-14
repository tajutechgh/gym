<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Days;

class DayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',

        ]);

        $day = new Days;

        $day->name = $request->name;

        $day->save();

        return redirect()->back()->with('message','Day added successfully');
    }
}
