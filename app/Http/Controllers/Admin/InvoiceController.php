<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Invoice;

class InvoiceController extends Controller
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
             
            'membership_type' => 'required',
            'total_amount' => 'required',
            'amount_payed' => 'required',

        ]);

        $invoice = new Invoice;

        $invoice->membership_type = $request->membership_type;
        $invoice->total_amount = $request->total_amount;
        $invoice->amount_payed = $request->amount_payed;
        $invoice->member_id = $request->member_id;
        $invoice->invoice_number = $request->invoice_number;

        $invoice->save();

        return redirect()->back()->with('message','Invoice added successfully');
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);

        return view('admin.member.printinvoice',compact('invoice'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'membership_type' => 'required',
            'total_amount' => 'required',
            'amount_payed' => 'required',

        ]);

        $invoice = Invoice::find($id);

        $invoice->membership_type = $request->membership_type;
        $invoice->total_amount = $request->total_amount;
        $invoice->amount_payed = $request->amount_payed;
        $invoice->member_id = $request->member_id;
        $invoice->invoice_number = $request->invoice_number;

        $invoice->save();

        return redirect()->back()->with('message','Invoice updated successfully');
    }

    public function destroy($id)
    {
        Invoice::where('id',$id)->delete();

        return redirect()->back()->with('message','Invoice deleted successfully');
    }
}
