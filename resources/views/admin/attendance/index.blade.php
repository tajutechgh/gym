@extends('admin.layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">

@endsection

@section('main-content')

@section('title','View Attendance')

@section('sub-title','View Attendance')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form method="post" action="{{ route('searchviewattendance') }}">
                    {{csrf_field()}}
                    <select type="text" name="class">
                        <option selected disabled="">Select class</option>
                        @foreach ($classes as $class)
                            <option>{{$class->name}}</option>
                        @endforeach
                    </select>
                    <label><b>Start Date:</b></label>
                    <input type="date" name="startdate"> 
                    <label><b>End Date:</b></label>
                    <input type="date" name="enddate">
                    <button class="btn-success">View</button>
                </form><br>

                @if (isset($details))
                    <div class="alert alert-success"><h4>Members present in the class as at that period.</h4></div>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Member Name</th>
                                <th>Day</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $attendance)
                                <tr>
                                    <td>{{$attendance->member['name']}}</td>
                                    <td>{{Carbon\Carbon::parse($attendance->created_at)->format('l')}}</td>
                                    <td>{{Carbon\Carbon::parse($attendance->created_at)->format('d-m-y')}}</td>
                                    <td>{{Carbon\Carbon::parse($attendance->created_at)->format('h:i:s')}}</td>
                                    <td>{{$attendance->register}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif(isset($message))
                   <div class="alert alert-danger"><h3>{{$message}}</h3> </div>
                @endif
                
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