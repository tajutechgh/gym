<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input as input;
use App\Model\admin\User;
use Auth;
use Hash;

class ChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function changePass()
	{
        return view('admin.passwordchange');
	}

	public function passChange(Request $request)
	{
		$this->validate($request,[

            'password' => 'required|string|min:6|confirmed',
            
        ]);

		$user = User::find(Auth::user()->id);

		if (Hash::check(Input::get('passwordold'),$user['password']) && Input::get('password') == Input::get('password_confirmation')) {

			$user->password = bcrypt(Input::get('password'));

			$user->save();
		}

		return back()->with('message','Password changed successfully');
	} 
}
