@extends('admin.layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">
<link href="{{ asset('admin/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

@endsection

@section('main-content')

@section('title','Staffs')

@section('sub-title','Staffs')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- add modal content button-->
                <div class="pull-left">
                    <button type="button" class="btn btn-success fa fa-plus-circle" data-toggle="modal" data-target="#myModal">Add Staff</button>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header" align="center">
                                <h4 class="modal-title" id="myModalLabel">Add Staff</h4>
                              </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 align="center">Personal Details</h4>
                                            <div class="form-group">
                                                <label class="control-label">Staff Name:</label>
                                                <input type="text" name="name" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email Address:</label>
                                                <input type="email" name="email" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Phone Number:</label>
                                                <input type="number" name="phone" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Category:</label>
                                                <select name="category" class="form-control" required="">
                                                    <option selected disabled="">Select category</option>
                                                    <option>Trainer</option>
                                                    <option>Non-trainer</option>
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
                                                <input type="file" name="image" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 align="center">Login Details</h4>
                                            <div class="form-group">
                                                <label class="control-label">User Name:</label>
                                                <input type="text" name="username" class="form-control"> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Password:</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Confirm Password:</label>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Assign Role:</label>
                                                <select class="select2 m-b-10 select2-multiple" name="role[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                    @foreach ($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="status" value="1"
                                                    class="custom-control-input"><span class="custom-control-label"> Status
                                                    </span>
                                                </label>
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
                <!-- /.end modal -->
                @include('include.message')
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="8%">Image</th>
                                <th>Staff Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Category</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th width="13%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="8%">Image</th>
                                <th>Staff Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Category</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th width="13%">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{Storage::disk('local')->url($user->image)}}" width="100%" height="50cm">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->category}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>
                                        @if ($user->status==1)
                                          <button class="btn btn-success btn-xs">Active</button>
                                        @else
                                          <button class="btn btn-danger btn-xs">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- edit modal content button -->
                                        <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal"
                                        data-target="#{{$user->id}}"></button>

                                        <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <form method="post" action="{{ route('user.update',$user->id) }}">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header" align="center">
                                                            <h4 class="modal-title" id="myModalLabel">Edit Staff</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4 align="center">Personal Details</h4>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Staff Name:</label><br>
                                                                        <input type="text" name="name" class="form-control" required="" value="{{$user->name}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Email Address:</label><br>
                                                                        <input type="email" name="email" class="form-control"
                                                                        required="" value="{{$user->email}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Phone Number:</label><br>
                                                                        <input type="number" name="phone" class="form-control" r
                                                                        equired="" value="{{$user->phone}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Category:</label><br>
                                                                        <select name="category" class="form-control"
                                                                        required="">
                                                                            <option>{{$user->category}}</option>
                                                                            <option>Trainer</option>
                                                                            <option>Non-trainer</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Gender:</label><br>
                                                                        <select name="gender" class="form-control" required="">
                                                                            <option>{{$user->gender}}</option>
                                                                            <option>Male</option>
                                                                            <option>Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4 align="center">Login Details</h4>
                                                                    <div class="form-group">
                                                                        <label class="control-label">User Name:</label>
                                                                        <input type="text" name="username" class="form-control" required="" value="{{$user->username}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Assign Role:</label><br>
                                                                        <select class="select2 m-b-10 select2-multiple" name="role[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                                            @foreach ($roles as $role)
                                                                                <option value="{{$role->id}}"
                                                                                    @foreach ($user->roles as $user_role)
                                                                                        @if ($user_role->id == $role->id)
                                                                                            selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                >{{$role->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="custom-control custom-checkbox">
                                                                            <input type="checkbox" name="status" value="1"
                                                                            class="custom-control-input" @if($user->status
                                                                                == 1) checked @endif><span class="custom-control-label"> Status
                                                                            </span>
                                                                        </label>
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
                                        <form method="post" id="delete-form-{{$user->id}}" action="{{route('user.destroy',
                                        $user->id)}}"
                                        style="display: none;">

                                        {{csrf_field()}}

                                        {{method_field('DELETE')}}

                                        </form>

                                        <a href="" onclick="
                                            if(confirm('Are yoy sure, You want to delete this data?')){
                                              event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit();
                                            }else{
                                              event.preventDefault();
                                            }" class="fa fa-trash-o btn btn-danger">
                                        </a>

                                        @if ($user->category == 'Trainer')
                                            {{-- view members button --}}
                                            <a href="{{ route('user.show',$user->id) }}" class="btn btn-info fa fa-users"
                                                title="View Members Assigned To The Trainer"></a>
                                        @endif
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

<script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });
    // For select 2
    $(".select2").select2();
    $('.selectpicker').selectpicker();
    //Bootstrap-TouchSpin
    $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    var vspinTrue = $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    if (vspinTrue) {
        $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
    }
    $("input[name='tch1']").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: '%'
    });
    $("input[name='tch2']").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        prefix: '$'
    });
    $("input[name='tch3']").TouchSpin();
    $("input[name='tch3_22']").TouchSpin({
        initval: 40
    });
    $("input[name='tch5']").TouchSpin({
        prefix: "pre",
        postfix: "post"
    });
    // For multiselect
    $('#pre-selected-options').multiSelect();
    $('#optgroup').multiSelect({
        selectableOptgroup: true
    });
    $('#public-methods').multiSelect();
    $('#select-all').click(function() {
        $('#public-methods').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function() {
        $('#public-methods').multiSelect('deselect_all');
        return false;
    });
    $('#refresh').on('click', function() {
        $('#public-methods').multiSelect('refresh');
        return false;
    });
    $('#add-option').on('click', function() {
        $('#public-methods').multiSelect('addOption', {
            value: 42,
            text: 'test 42',
            index: 0
        });
        return false;
    });
    $(".ajax").select2({
        ajax: {
            url: "https://api.github.com/search/repositories",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        //templateResult: formatRepo, // omitted for brevity, see the source of this page
        //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });
});
</script>

@endsection
