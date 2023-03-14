@extends('admin.layouts.master')

@section('head')

<!-- page css -->
<link href="{{ asset('admin/css/pages/inbox.css') }}" rel="stylesheet">

@endsection

@section('main-content')

@section('title','Inbox Messages')

@section('sub-title','Inbox Messages')

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
                                <a href="{{ route('sent') }}"> <i class="mdi mdi-file-document-box"></i> Sent Messages </a>
                                <span class="badge badge-success ml-auto">{{$countmessages}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                    <div class="card-body p-t-0">
                        <div class="card b-all shadow-none">
                            @include('include.message')
                            <div class="inbox-center table-responsive">
                                <table class="table table-hover no-wrap">
                                    <tbody>
                                        @forelse ($contacts as $contact)
                                            <tr class="unread">
                                                <td style="width:40px">
                                                    {{-- delete button --}}
                                                    <a href="{{ route('delete',$contact->id) }}"><i class="fa fa-trash btn btn-danger btn-xs"></i></a>
                                                </td>
                                                <td class="hidden-xs-down">{{$contact->name}}</td>
                                                <td class="max-texts"> <a href="{{ route('inbox',$contact->id) }}"/>
                                                    {{$contact->title}}
                                                </td>
                                                <td class="text-right">{{Carbon\Carbon::parse($contact->created_at)->
                                                format('d-m-y')}}</td>
                                                <td class="text-right">{{Carbon\Carbon::parse($contact->created_at)->
                                                format('h:i:s')}}</td>
                                            </tr>
                                        @empty
                                            <br>
                                            <h4 align="center">No message available.</h4>
                                        @endforelse
                                    </tbody>
                                </table>
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