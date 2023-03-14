@extends('admin.layouts.master')

@section('head')

<!-- Calendar CSS -->
<link href="{{ asset('admin/assets/plugins/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />

@endsection

@section('main-content')

@section('title','Dashboard')

@section('sub-title','Dashboard')

<!-- ============================================================== -->
<!-- Stats box -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center"><img src="{{ asset('admin/assets/images/icon/income.png') }}" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Total Classes</h6>
                        <h2 class="m-t-0">{{$countclasses}}</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center"><img src="{{ asset('admin/assets/images/icon/income.png') }}" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Total Groups</h6>
                        <h2 class="m-t-0">{{$countgroups}}</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center"><img src="{{ asset('admin/assets/images/icon/staff.png') }}" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Total Members</h6>
                        <h2 class="m-t-0">{{$countmembers}}</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center"><img src="{{ asset('admin/assets/images/icon/staff.png') }}" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Total Staff</h6>
                        <h2 class="m-t-0">{{$countstaffs}}</h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Sales overview chart -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div>
                        <h3 class="card-title m-b-5"><span class="lstick"></span>Members Celebrating Birthday Today</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table color-table info-table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member's Name</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$member->name}}</td>
                                    <td>{{$member->gender}}</td>
                                    <td>{{$member->phone}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div>
                        <h3 class="card-title m-b-5"><span class="lstick"></span>Today Expired Memberships</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table color-table danger-table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member's Name</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expired_memberships as $membership)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$membership->name}}</td>
                                    <td>{{$membership->gender}}</td>
                                    <td>{{$membership->phone}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                {!! $calendar_details->calendar() !!}
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->

@endsection

@section('footer')

<!-- Calendar JavaScript -->
<script src="{{ asset('admin/assets/plugins/calendar/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/moment/moment.js') }}"></script>
<script src='{{ asset('admin/assets/plugins/calendar/dist/fullcalendar.min.js') }}'></script>

{!! $calendar_details->script() !!}

@endsection