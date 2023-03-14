@extends('admin.layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">

@endsection

@section('main-content')

@section('title','Invoice')

@section('sub-title','Invoice')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- add modal content button-->
            	<div class="pull-right">
            	    <button type="button" class="btn btn-success fa fa-plus-circle" data-toggle="modal" data-target="#myModal">Add Ivoice</button>
            	</div>
            	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            	    <div class="modal-dialog" role="document">
            	        <form method="post" action="{{ route('invoice.store') }}">
            	            {{csrf_field()}}
            	            <div class="modal-content">
            	              <div class="modal-header" align="center">
            	                <h4 class="modal-title" id="myModalLabel">Add Ivoice</h4>
            	              </div>
            	                <div class="modal-body">
            	                	<input type="hidden" name="member_id" class="form-control" value="{{$invoice->id}}">
            	                	<input type="hidden" class="form-control" name="invoice_number" value="<?php echo rand(1,10000); ?>">
            	                    <div class="form-group">
            	                        <label class="control-label">Membership Type:</label>
            	                        <input type="text" name="membership_type" class="form-control" required="" 
            	                        value="{{$invoice->membership['name']}}">
            	                    </div>
            	                    <div class="form-group">
            	                        <label class="control-label">Amount To Pay(GH₵):</label>
            	                        <input type="text" name="total_amount" class="form-control" required="" 
            	                        value="{{$invoice->membership['price']}}">
            	                    </div>
            	                    <div class="form-group">
            	                        <label class="control-label">Amount Payed:</label>
            	                        <input type="number" name="amount_payed" class="form-control" required="">
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
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Membership Type</th>
                                <th>Amount To Pay(GH₵)</th>
                                <th>Amount Payed(GH₵)</th>
                                <th>Balance Amount(GH₵)</th>
                                <th width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member_invoices as $invoice)
                                <tr>
                                    <td>{{Carbon\Carbon::parse($invoice->created_at)->format('d-m-y')}}</td>
                                    <td>{{$invoice->membership_type}}</td>
                                    <td>{{$invoice->total_amount}}</td>
                                    <td>{{$invoice->amount_payed}}</td>
                                    <td>{{$invoice->total_amount - $invoice->amount_payed}}</td>
                                    <td>
                                    	<!-- add modal content button-->
                                    	<button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" 
                                    	data-target="#{{$invoice->id}}"></button>

                                    	<div class="modal fade" id="{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    	    <div class="modal-dialog" role="document">
                                    	        <form method="post" action="{{ route('invoice.update',$invoice->id) }}">
                                    	            {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                    	            <div class="modal-content">
                                    	              <div class="modal-header" align="center">
                                    	                <h4 class="modal-title" id="myModalLabel">Edit Invoice</h4>
                                    	              </div>
                                    	                <div class="modal-body">
            	                	                        <input type="hidden" name="member_id" class="form-control" 
            	                	                            value="{{$invoice->member_id}}">
        	                	                            <input type="hidden" name="invoice_number" class="form-control" 
        	                	                            value="{{$invoice->invoice_number}}">
						            	                    <div class="form-group">
						            	                        <label class="control-label">Membership Type:</label>
						            	                        <input type="text" name="membership_type" class="form-control" required="" value="{{$invoice->membership_type}}">
						            	                    </div>
						            	                    <div class="form-group">
						            	                        <label class="control-label">Amount To Pay(GH₵):</label>
						            	                        <input type="text" name="total_amount" class="form-control" required="" value="{{$invoice->total_amount}}">
						            	                    </div>
						            	                    <div class="form-group">
						            	                        <label class="control-label">Amount Payed:</label>
						            	                        <input type="number" name="amount_payed" class="form-control" required="" value="{{$invoice->amount_payed}}">
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

                                    	{{-- delete button --}}
                                    	<form method="post" id="delete-form-{{$invoice->id}}" action="{{route('invoice.destroy', $invoice->id)}}" 
                                    	style="display: none;">
                                    	
                                    	{{csrf_field()}}

                                    	{{method_field('DELETE')}}

                                    	</form>
                                    	
                                    	<a href="" onclick="
	                                    	if(confirm('Are yoy sure, You want to delete this data?')){
	                                    	  event.preventDefault();document.getElementById('delete-form-{{$invoice->id}}').submit();
	                                    	}else{
	                                    	  event.preventDefault();
	                                    	}" class="fa fa-trash-o btn btn-danger">
                                    	</a>

                                    	{{-- print invoice button --}}
                                    	<a href="{{ route('invoice.show',$invoice->id) }}" class="btn btn-info fa fa-print" title="Print Invoice"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><br>
                <div align="center">
                    <a href="{{ route('member.index') }}" class="btn btn-success btn-sm">Go Back</a>
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