<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\admin\Invoice;
use App\Model\admin\Expense;

class ReportController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth');
    }

    public function billing()
    {
        return view('admin.billingreport');
    }

    public function searchBilling()
    {

        $startdate = Input::get('startdate');

        $enddate = Input::get('enddate');

        $billing = Invoice::whereBetween('created_at', [$startdate,$enddate])->get();

        if (count($billing) > 0) {

            return view('admin.billingreport')->withDetails($billing)->withQuery($startdate, $enddate);
        }

        return view('admin.billingreport')->withMessage('No billing report available!');
    }

    public function expense()
    {
    	return view('admin.expensesreport');
    }

    public function searchExpense()
    {

        $startdate = Input::get('startdate');

        $enddate = Input::get('enddate');

        $expense = Expense::whereBetween('created_at', [$startdate,$enddate])->get();

        if (count($expense) > 0) {

            return view('admin.expensesreport')->withDetails($expense)->withQuery($startdate, $enddate);
        }

        return view('admin.expensesreport')->withMessage('No expenses report available!');
    }
}
