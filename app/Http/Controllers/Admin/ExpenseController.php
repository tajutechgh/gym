<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Expense;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $expenses = Expense::latest()->get();

        return view('admin.expense.index',compact('expenses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'amount' => 'required',
        ]);

        $expense = new Expense;

        $expense->name = $request->name;
        $expense->amount = $request->amount;

        $expense->save();

        return redirect(route('expense.index'))->with('message','Expense added successfully');
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
            'amount' => 'required',
        ]);

        $expense = Expense::find($id);

        $expense->name = $request->name;
        $expense->amount = $request->amount;

        $expense->save();

        return redirect(route('expense.index'))->with('message','Expense updated successfully');
    }

    public function destroy($id)
    {
        Expense::where('id',$id)->delete();

        return redirect()->back()->with('message','Expense deleted successfully');
    }
}
