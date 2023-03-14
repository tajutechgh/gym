@extends('admin.layouts.master')

@section('head')

@endsection

@section('main-content')

@section('title','Change Password')

@section('sub-title','Change Password') 

<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                @include('include.message')
                <form method="post" action="{{ route('passchange') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="password">Old Password</label>

                        <input id="password" type="password" class="form-control" name="passwordold" required>
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>

                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection