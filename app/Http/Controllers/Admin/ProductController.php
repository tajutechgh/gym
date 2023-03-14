<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $imagename = $request->image->getClientOriginalName();

            $request->image->storeAs('public',$imagename);

            $request->status? : $request['status']=0;

            $product = new Product;

            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->status = $request->status;
            $product->image = $imagename;

            $product->save();
        }

        return redirect(route('product.index'))->with('message','Product added successfully');
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
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $request->status? : $request['status']=0;

        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->status;

        $product->save();

        return redirect(route('product.index'))->with('message','Product updated successfully');
    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();

        return redirect()->back()->with('message','Product deleted successfully');
    }
}
