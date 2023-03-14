@extends('admin.layouts.master')

@section('head')

<!-- page css -->
<link href="{{ asset('admin/css/pages/inbox.css') }}" rel="stylesheet">

@endsection

@section('main-content')

@section('title','Message Details')

@section('sub-title','Message Details')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="row">
                <div class="col-xlg-2 col-lg-3 col-md-4">
                    <div class="card-body inbox-panel"><a href="{{ route('message.create') }}" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                        <ul class="list-group list-group-full">
                            <li class="list-group-item active"> <a href="{{ route('message.index') }}">
                                <i class="mdi mdi-gmail"></i>Inbox </a><span class="badge badge-success ml-auto">
                                {{$countcontacts}}</span>
                            </li>
                            <li class="list-group-item ">
                                <a href="{{ route('sent') }}"> <i class="mdi mdi-file-document-box"></i> Sent Messages</a>
                                <span class="badge badge-success ml-auto">{{$countmessages}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                    <div class="card-body p-t-0">
                        <div class="card b-all shadow-none">
                            <div class="card-body">
                                <h3 class="card-title m-b-0">Inbox Message Details</h3>
                            </div>
                            <div>
                                <hr class="m-t-0">
                            </div>
                            <div class="card-body">
                                <div class="d-flex m-b-40">
                                    <div class="p-l-10">
                                        <h4 class="m-b-0 fa fa-user"> {{$contact->name}}</h4><br>
                                        <small class="text-muted fa fa-phone"> {{$contact->phone}}</small>
                                    </div>
                                </div>
                                <p>{!!htmlspecialchars_decode($contact->message)!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection