<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\admin\Classe;
use App\Model\admin\Gallery;
use App\Model\admin\User;
use App\Model\admin\Product;
use App\Model\admin\Membership;

class HomeController extends Controller
{
    public function index()
    {
        $classes = Classe::latest()->limit(3)->get();

        $galleries = Gallery::latest()->limit(9)->get();

        $products = Product::latest()->limit(3)->get();

        $memberships = Membership::latest()->limit(6)->get();

        $trainers = User::where('category','=','Trainer')->get();

        return view('user.home',compact('classes','galleries','trainers','products','memberships'));
    }
}
