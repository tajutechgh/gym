<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\User;
use App\Model\admin\Classe;
use App\Model\admin\Product;

class PagesController extends Controller
{
    public function about()
    {
    	$trainers = User::where('category','=','Trainer')->get();

    	return view('user.about',compact('trainers'));
    }

    public function class()
    {
    	$classes = Classe::latest()->paginate(5);

    	return view('user.class',compact('classes'));
    }

    public function trainer()
    {
    	$trainers = User::where('category','=','Trainer')->paginate(6);

    	return view('user.trainer',compact('trainers'));
    }

    public function product()
    {
    	$products = Product::latest()->paginate(6);

    	return view('user.product',compact('products'));
    }
}
