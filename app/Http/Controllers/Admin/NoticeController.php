<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Notice;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notices = Notice::latest()->get();

        return view('admin.notice.index',compact('notices'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',

        ]);

        $notice = new Notice;

        $notice->title=$request->title;
        $notice->body=$request->body;

        $notice->save();

        return redirect(route('notice.index'))->with('message','Notice added successfully');
    }

    public function show($id)
    {
        $notice = Notice::find($id);

        return view('admin.notice.show',compact('notice'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',

        ]);

        $notice = Notice::find($id);

        $notice->title=$request->title;
        $notice->body=$request->body;

        $notice->save();

        return redirect(route('notice.index'))->with('message','Notice updated successfully');
    }

    public function destroy($id)
    {
        Notice::where('id',$id)->delete();

        return redirect()->back()->with('message','Notice deleted successfully');
    }
}
