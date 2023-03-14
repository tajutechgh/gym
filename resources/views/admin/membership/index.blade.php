@extends('admin.layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">

@endsection

@section('main-content')

@section('title','Memberships')

@section('sub-title','Memberships')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- add modal content button-->
                <div class="pull-left">
                    <button type="button" class="btn btn-success fa fa-plus-circle" data-toggle="modal" data-target="#myModal">Add Membership</button>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('membership.store') }}">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header" align="center">
                                <h4 class="modal-title" id="myModalLabel">Add Membership</h4>
                              </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Membership Name:</label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Membership Period(Days):</label>
                                        <input type="number" name="days" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Membership Price:</label>
                                        <input type="number" name="price" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Instalment Plan:</label>
                                        <input type="text" name="instalment_plan" class="form-control" required="">
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
                                <th>Membership Name</th>
                                <th>Membership Period(Days)</th>
                                <th>Membership Price(GH₵)</th>
                                <th>Instalment Plan</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Membership Name</th>
                                <th>Membership Period(Days)</th>
                                <th>Membership Price(GH₵)</th>
                                <th>Instalment Plan</th>
                                <th width="10%">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($memberships as $membership)
                                <tr>
                                    <td>{{$membership->name}}</td>
                                    <td>{{$membership->days}}</td>
                                    <td>{{$membership->price}}</td>
                                    <td>{{$membership->instalment_plan}}</td>
                                    <td>
                                        <!-- edit modal content button -->
                                        <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" 
                                        data-target="#{{$membership->id}}"></button>

                                        <div class="modal fade" id="{{$membership->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <form method="post" action="{{ route('membership.update',$membership->id) }}">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header" align="center">
                                                            <h4 class="modal-title" id="myModalLabel">Edit Membership</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label class="control-label">Membership Name:</label><br>
                                                                <input type="text" name="name" class="form-control" required="" value="{{$membership->name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Membership Period(Days):</label>
                                                                <br>
                                                                <input type="number" name="days" class="form-control" 
                                                                required="" value="{{$membership->days}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Membership Price:</label><br>
                                                                <input type="number" name="price" class="form-control" 
                                                                required="" value="{{$membership->price}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Instalment Plan:</label><br>
                                                                <input type="text" name="instalment_plan" class="form-control" 
                                                                required="" value="{{$membership->instalment_plan}}">
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
                                        <form method="post" id="delete-form-{{$membership->id}}" 
                                            action="{{route('membership.destroy', $membership->id)}}" 
                                        style="display: none;">
                                        
                                        {{csrf_field()}}

                                        {{method_field('DELETE')}}

                                        </form>
                                        
                                        <a href="" onclick="
                                        if(confirm('Are yoy sure, You want to delete this data?')){
                                          event.preventDefault();document.getElementById('delete-form-{{$membership->id}}').
                                          submit();
                                        }else{
                                          event.preventDefault();
                                        }" class="fa fa-trash-o btn btn-danger"></a>
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