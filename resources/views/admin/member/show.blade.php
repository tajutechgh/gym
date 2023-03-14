@extends('admin.layouts.master')

@section('head')

@endsection

@section('main-content')

@section('title','Member Details')

@section('sub-title','Member Details')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <img src="{{Storage::disk('local')->url($member->image)}}" style="height: 300px; width: 500px;" 
                        class="img-thumbnail">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <tr><th>Member's Name:</th><td>{{$member->name}}</td></tr>
                            <tr><th>Residential Address:</th><td>{{$member->address}}</td></tr>
                            <tr><th>Email Address:</th><td>{{$member->email}}</td></tr>
                            <tr><th>Date of Birth:</th><td>{{$member->dob}}</td></tr>
                            <tr><th>Phone Number:</th><td>{{$member->phone}}</td></tr>
                            <tr><th>Gender:</th><td>{{$member->gender}}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <tr><th>Start Date:</th><td>{{$member->start_date}}</td></tr>
                            <tr><th>End Date:</th><td>{{$member->end_date}}</td></tr>
                            <tr><th>Membership Type:</th><td>{{$member->membership['name']}}</td></tr>
                            <tr><th>Personal Trainer:</th><td>@if ($member->user_id==null)
                                Not assigned to a personal trainer @else {{$member->user['name']}} @endif</td>
                            </tr>
                            <tr><th>Assigned Class:</th><td>@if ($member->class_id==null)
                                Not assigned to a class @else {{$member->classe['name']}} @endif</td>
                            </tr>
                            <tr><th>Assigned Group:</th><td>@if ($member->group_id==null)
                                Not assigned to a group @else {{$member->group['name']}} @endif</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div align="center">
                    <a href="{{ route('member.index') }}" class="btn btn-success btn-sm">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection