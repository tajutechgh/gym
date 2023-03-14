<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Equipment;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipments = Equipment::latest()->get();

        return view('admin.equipment.index',compact('equipments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'price_perunit' => 'required',
            'quantity' => 'required',
        ]);

        $equipment = new Equipment;

        $equipment->name = $request->name;
        $equipment->price_perunit = $request->price_perunit;
        $equipment->quantity = $request->quantity;

        $equipment->save();

        return redirect(route('equipment.index'))->with('message','Equipment added successfully');
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
            'price_perunit' => 'required',
            'quantity' => 'required',
        ]);

        $equipment = Equipment::find($id);

        $equipment->name = $request->name;
        $equipment->price_perunit = $request->price_perunit;
        $equipment->quantity = $request->quantity;

        $equipment->save();

        return redirect(route('equipment.index'))->with('message','Equipment updated successfully');
    }

    public function destroy($id)
    {
        Equipment::where('id',$id)->delete();

        return redirect()->back()->with('message','Equipment deleted successfully');
    }
}
