@extends('admin.layouts.master')

@section('head')

@endsection

@section('main-content')

@section('title','Add New Event')

@section('sub-title','Add New Event')

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                @include('include.message')
                <form method="post" action="{{ route('event.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="password">Event Name:</label>

                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Start Date:</label>

                        <input type="date" class="form-control" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">End Date:</label>

                        <input type="date" class="form-control" name="end_date" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Save
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