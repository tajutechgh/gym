@extends('admin.layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">

@endsection

@section('main-content')

@section('title','Members')

@section('sub-title','Members')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- add modal content button-->
                @can('user.memberaction', Auth::user())
                <div class="pull-left">
                    <button type="button" class="btn btn-success fa fa-plus-circle" data-toggle="modal" data-target="#myModal">Add Member</button>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <form method="post" action="{{ route('member.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header" align="center">
                                <h4 class="modal-title" id="myModalLabel">Add Member</h4>
                              </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Member's Name:</label>
                                                <input type="text" name="name" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email Address:</label>
                                                <input type="email" name="email" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Residential Address:</label>
                                                <input type="text" name="address" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Phone Number:</label>
                                                <input type="number" name="phone" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Date of Birth:</label>
                                                <input type="date" name="dob" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Start Date:</label><br>
                                                <input type="date" name="start_date" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="image" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Assign Membership:</label>
                                                <select name="membership_id" class="form-control" required="">
                                                    <option selected disabled="">Select membership</option>
                                                    @foreach ($memberships as $membership)
                                                        <option value="{{$membership->id}}">{{$membership->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Assign Trainer:</label>
                                                <select name="user_id" class="form-control" required="">
                                                    <option selected disabled="">Select trainer</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Assign Class:</label>
                                                <select name="class_id" class="form-control" required="">
                                                    <option selected disabled="">Select class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Assign Group:</label>
                                                <select name="group_id" class="form-control" required="">
                                                    <option selected disabled="">Select group</option>
                                                    @foreach ($groups as $group)
                                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Gender:</label>
                                                <select name="gender" class="form-control" required="">
                                                    <option selected disabled="">Select gender</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>End Date:</label><br>
                                                <input type="date" name="end_date" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endcan
                <!-- /.end modal -->
                @include('include.message')
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="8%">Image</th>
                                <th>Member's Name</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Gender</th>
                                <th>Memshp Status</th>
                                <th width="">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="8%">Image</th>
                                <th>Member's Name</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Gender</th>
                                <th>Memshp Status</th>
                                <th width="">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>
                                        <img src="{{Storage::disk('local')->url($member->image)}}" width="100%" height="50cm">
                                    </td>
                                    <td>{{$member->name}}</td>
                                    <td>{{$member->phone}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->gender}}</td> 
                                    <td>
                                        @if (Carbon\Carbon::now()->between(Carbon\Carbon::parse($member->start_date),Carbon\Carbon::parse($member->end_date)))
                                            <button class="btn btn-success btn-xs">Valid</button>    
                                        @else
                                            <button class="btn btn-danger btn-xs">Expired</button>
                                        @endif
                                    </td>
                                    <td>
                                        @can('user.memberaction', Auth::user())
                                        <!-- edit modal content button -->
                                        <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" 
                                        data-target="#{{$member->id}}"></button>

                                        <div class="modal fade" id="{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <form method="post" action="{{ route('member.update',$member->id) }}">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header" align="center">
                                                            <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Member's Name:</label><br>
                                                                        <input type="text" name="name" class="form-control" required="" value="{{$member->name}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Email Address:</label><br>
                                                                        <input type="email" name="email" class="form-control" required="" value="{{$member->email}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Residential Address:</label><br>
                                                                        <input type="text" name="address" class="form-control" required="" value="{{$member->address}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Phone Number:</label><br>
                                                                        <input type="number" name="phone" class="form-control" required="" value="{{$member->phone}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Date of Birth:</label><br>
                                                                        <input type="date" name="dob" class="form-control" required="" value="{{$member->dob}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Start Date:</label><br>
                                                                        <input type="date" name="start_date" class="form-control" required="" value="{{$member->start_date}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Assign Membership:</label><br>
                                                                        <select name="membership_id" class="form-control" required="">
                                                                            <option selected disabled="">Select membership
                                                                            </option>
                                                                            @foreach ($memberships as $membership)
                                                                                <option value="{{$membership->id}}" 
                                                                                    @if ($member->membership_id == $membership->id)selected
                                                                                    @endif
                                                                                >{{$membership->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Assign Trainer:</label><br>
                                                                        <select name="user_id" class="form-control">
                                                                            <option selected disabled="">Select trainer</option>
                                                                            @foreach ($users as $user)
                                                                                <option value="{{$user->id}}"
                                                                                    @if ($member->user_id == $user->id)
                                                                                    selected
                                                                                    @endif
                                                                                >{{$user->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Assign Class:</label><br>
                                                                        <select name="class_id" class="form-control">
                                                                            <option selected disabled="">Select class</option>
                                                                            @foreach ($classes as $class)
                                                                                <option value="{{$class->id}}" 
                                                                                    @if ($member->class_id == $class->id)selected
                                                                                    @endif
                                                                                >{{$class->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Assign Group:</label><br>
                                                                        <select name="group_id" class="form-control">
                                                                            <option selected disabled="">Select group</option>
                                                                            @foreach ($groups as $group)
                                                                                <option value="{{$group->id}}" 
                                                                                    @if ($member->group_id == $group->id)selected
                                                                                    @endif
                                                                                >{{$group->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Gender:</label><br>
                                                                        <select name="gender" class="form-control" required="">
                                                                            <option>{{$member->gender}}</option>
                                                                            <option>Male</option>
                                                                            <option>Female</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>End Date:</label><br>
                                                                        <input type="date" name="end_date" class="form-control" required="" value="{{$member->end_date}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal -->

                                        {{-- delete button --}}
                                        <form method="post" id="delete-form-{{$member->id}}" action="{{route('member.destroy', 
                                        $member->id)}}" 
                                        style="display: none;">
                                        
                                        {{csrf_field()}}

                                        {{method_field('DELETE')}}

                                        </form>
                                        
                                        <a href="" onclick="
                                            if(confirm('Are yoy sure, You want to delete this data?')){
                                              event.preventDefault();document.getElementById('delete-form-{{$member->id}}').submit();
                                            }else{
                                              event.preventDefault();
                                            }" class="fa fa-trash-o btn btn-danger">
                                        </a>

                                        {{-- invoice button --}}
                                        <a href="{{ route('invoice',$member->id) }}" class="btn btn-info fa fa-money" 
                                            title="Ivoice"></a>
                                        @endcan

                                        {{-- details button --}}
                                        <a href="{{ route('member.show',$member->id) }}" class="btn btn-info fa fa-user" 
                                            title="View Member Details"></a>

                                        {{-- measurement button --}}
                                        <a href="{{ route('measurement',$member->id) }}" class="btn btn-info fa fa-bar-chart" 
                                            title="Measurement"></a>

                                        {{-- attendance button --}}
                                        <a href="{{ route('attendance',$member->id) }}" class="btn btn-info fa fa-calendar"
                                            title="Attendance"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

<!-- This is data table -->
<script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="{{ asset('admin/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js') }}"></script>
<script src="{{ asset('admin/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js') }}"></script>
<!-- end - This is for export functionality only -->
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
</script>

@endsection