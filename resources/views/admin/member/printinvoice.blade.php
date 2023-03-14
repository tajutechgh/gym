@extends('admin.layouts.master')

@section('head')

@endsection

@section('main-content')

@section('title','Print Invoice')

@section('sub-title','Print Invoice')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>INVOICE</b> <span class="pull-right">#{{$invoice->invoice_number}}</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">De-Don Fitness Center</b></h3>
                                            <p class="text-muted m-l-5">Mac Vee Str.,
                                                <br/> Ashaley Botwe - New Town,
                                                <br/> Near St. Peter's School</p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold">{{$invoice->member['name']}},</h4>
                                            <p class="text-muted m-l-30">{{$invoice->member['address']}},
                                                <br/> {{$invoice->member['phone']}}</p>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 
                                                {{Carbon\Carbon::parse($invoice->created_at)->format('d-m-y')}}
                                            </p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Membership Type</th>
                                                    <th>Amount To Pay(GH₵)</th>
                                                    <th>Amount Payed(GH₵)</th>
                                                    <th>Balance Amount(GH₵)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$invoice->membership_type}}</td>
                                                    <td>{{$invoice->total_amount}}</td>
                                                    <td>{{$invoice->amount_payed}}</td>
                                                    <td>{{$invoice->total_amount - $invoice->amount_payed}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <h3><b>Amount Payed :</b> GH₵{{$invoice->amount_payed}}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div align="center">
                    <a href="{{ route('member.index') }}" class="btn btn-success btn-sm">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

<!--Custom JavaScript -->
<script src="{{ asset('admin/js/custom.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.PrintArea.js') }}" type="text/JavaScript"></script>
<script>
$(document).ready(function() {
    $("#print").click(function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea").printArea(options);
    });
});
</script>

@endsection