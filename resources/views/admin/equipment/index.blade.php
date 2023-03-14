@extends('admin.layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">

@endsection

@section('main-content')

@section('title','Equipments')

@section('sub-title','Equipments')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- add modal content button-->
                <div class="pull-left">
                    <button type="button" class="btn btn-success fa fa-plus-circle" data-toggle="modal" data-target="#myModal">Add Equipment</button>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('equipment.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header" align="center">
                                <h4 class="modal-title" id="myModalLabel">Add Equipment</h4>
                              </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Equipment's Name:</label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Equipment's Quantity:</label>
                                        <input type="number" name="quantity" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Price Per Unit:</label>
                                        <input type="number" name="price_perunit" class="form-control" required="">
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
                                <th>Equipments Name</th>
                                <th>Equipments Quantity</th>
                                <th>Price Per Unit(GH₵)</th>
                                <th>Total Price(GH₵)</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Equipments Name</th>
                                <th>Equipments Quantity</th>
                                <th>Price Per Unit(GH₵)</th>
                                <th>Total Price(GH₵)</th>
                                <th width="10%">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($equipments as $equipment)
                                <tr>
                                    <td>{{$equipment->name}}</td>
                                    <td>{{$equipment->quantity}}</td>
                                    <td>{{$equipment->price_perunit}}</td>
                                    <td>{{$equipment->price_perunit * $equipment->quantity}}</td>
                                    <td>
                                        <!-- edit modal content button -->
                                        <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" 
                                        data-target="#{{$equipment->id}}"></button>

                                        <div class="modal fade" id="{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <form method="post" action="{{ route('equipment.update',$equipment->id) }}">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header" align="center">
                                                            <h4 class="modal-title" id="myModalLabel">Edit Equipment</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label class="control-label">Equipment's Name:</label><br>
                                                                <input type="text" name="name" class="form-control" required="" value="{{$equipment->name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Equipment's Quantity:</label><br>
                                                                <input type="number" name="quantity" class="form-control" 
                                                                required="" value="{{$equipment->quantity}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Price Per Unit:</label><br>
                                                                <input type="number" name="price_perunit" class="form-control" 
                                                                required="" value="{{$equipment->price_perunit}}">
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
                                        <form method="post" id="delete-form-{{$equipment->id}}" action="{{route('equipment.destroy', $equipment->id)}}" 
                                        style="display: none;">
                                        
                                        {{csrf_field()}}

                                        {{method_field('DELETE')}}

                                        </form>
                                        
                                        <a href="" onclick="
                                        if(confirm('Are yoy sure, You want to delete this data?')){
                                          event.preventDefault();document.getElementById('delete-form-{{$equipment->id}}').submit();
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