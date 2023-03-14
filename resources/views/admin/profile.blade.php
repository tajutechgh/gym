@extends('admin.layouts.master')

@section('head')

@endsection

@section('main-content')

@section('title','User Profile')

@section('sub-title','User Profile')

<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> 
                    <img src="{{Storage::disk('local')->url($user->image)}}" class="img-circle" width="150" 
                    style="width: 250px;"/>
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                        <div class="sl-item">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name:</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled="" placeholder="{{$user->name}}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">User Name:</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled="" placeholder="{{$user->username}}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email Address:</label>
                                    <div class="col-md-12">
                                        <input type="email" disabled="" placeholder="{{$user->email}}" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone Number:</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled="" placeholder="{{$user->phone}}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Gender:</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled="" placeholder="{{$user->gender}}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Category:</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled="" placeholder="{{$user->category}}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->

@endsection

@section('footer')

@endsection