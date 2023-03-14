<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\User;
use App\Model\admin\Member;
use App\Model\admin\Expense;
use App\Model\admin\Classe;
use App\Model\admin\Group;
use Carbon\Carbon;
use App\Model\admin\Event;
use Calendar;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$events = Event::get();

    	$event_list = [];

    	foreach ($events as $key => $event) {
    	    $event_list[] = Calendar::event(
    	        $event->name,
    	        true,
    	        new \DateTime($event->start_date),
    	        new \DateTime($event->end_date.' +1 day')
    	    );
    	}

    	$calendar_details = Calendar::addEvents($event_list); 


    	$countstaffs = User::count();

    	$countmembers = Member::count();

    	$countclasses = Classe::count();

    	$countgroups = Group::count();

    	$members = Member::whereRaw("MONTH(`dob`) = MONTH(NOW()) and DAY(`dob`) = DAY(NOW())")->get();

    	$expired_memberships = Member::whereRaw("MONTH(`end_date`) = MONTH(NOW()) and DAY(`end_date`) = DAY(NOW())")->get();

    	return view('admin.home',compact('countstaffs','countmembers','countgroups','countclasses','members', 'expired_memberships','calendar_details'));
    }
}
