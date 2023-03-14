@extends('admin.layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">

@endsection

@section('main-content')

@section('title','Billing Report')

@section('sub-title','Billing Report')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('searchreport') }}">
                    {{csrf_field()}}
                    <label><b>Start Date:</b></label>
                    <input type="date" name="startdate"> 
                    <label><b>End Date:</b></label>
                    <input type="date" name="enddate">
                    <button class="btn-success">Search</button>
                </form><br>

                @if (isset($details))
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Members Name</th>
                                <th>Date</th>
                                <th>Invoice #</th>
                                <th>Membership Type</th>
                                <th>Amount To Pay(GH₵)</th>
                                <th>Amount Payed(GH₵)</th>
                                <th>Balance Amount(GH₵)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $billing)
                                <tr>
                                    <td>{{$billing->member['name']}}</td>
                                    <td>{{Carbon\Carbon::parse($billing->created_at)->format('d-m-y')}}</td>
                                    <td>{{$billing->invoice_number}}</td>
                                    <td>{{$billing->membership_type}}</td>
                                    <td>{{$billing->total_amount}}</td>
                                    <td>{{$billing->amount_payed}}</td>
                                    <td>{{$billing->total_amount - $billing->amount_payed}}</td>
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
        'pdf', 'print'
    ]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
</script>

@endsection