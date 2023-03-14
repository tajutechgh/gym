<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Gallery;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $galleries = Gallery::latest()->paginate(20);

        return view('admin.gallery.index',compact('galleries'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',

        ]);

        if ($request->hasFile('image')) {

            $imagename = $request->image->getClientOriginalName();

            $request->image->storeAs('public',$imagename);

            $gallery = new Gallery;

            $gallery->name = $request->name;
            $gallery->image = $imagename;

            $gallery->save();
        }

        return redirect(route('gallery.index'))->with('message','Photo added successfully');
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
        //
    }

    public function destroy($id)
    {
        Gallery::where('id',$id)->delete();

        return redirect()->back()->with('message','Photo deleted successfully');
    }
}
