@extends('admin.layouts.master')

@section('head')

<!-- page css -->
<link href="{{ asset('admin/css/pages/inbox.css') }}" rel="stylesheet">
<!-- wysihtml5 CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/html5-editor/bootstrap-wysihtml5.css') }}" />

<link href="{{ asset('admin/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

@endsection

@section('main-content')

@section('title','Compose Message')

@section('sub-title','Compose Message')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="row">
                <div class="col-xlg-2 col-lg-3 col-md-4 ">
                    <div class="card-body inbox-panel"><a href="{{ route('message.create') }}" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                        <ul class="list-group list-group-full">
                            <li class="list-group-item active"> <a href="{{ route('message.index') }}">
                                <i class="mdi mdi-gmail"></i>Inbox </a><span class="badge badge-success ml-auto">
                                {{$countcontacts}}</span>
                            </li>
                            <li class="list-group-item ">
                                <a href="{{ route('sent') }}"> <i class="mdi mdi-file-document-box"></i> Sent Messages </a>
                                <span class="badge badge-success ml-auto">{{$countmessages}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                    <div class="card-body">
                        @include('include.message')
                        <h3 class="card-title">Compose New Message</h3>
                        <form action="{{ route('message.store') }}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Select Member:</label>
                                <select name="member_id[]" class="select2 m-b-10 select2-multiple member" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                    {{-- <option selected disabled="">Select Member:</option> --}}
                                    @foreach ($members as $member)
                                        <option value="{{$member->id}}">{{$member->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <input type="text" class="form-control" id="contact" name="phone" placeholder="Contact:" required="">
                            </div> --}}
                            <div class="form-group">
                                <textarea class="textarea_editor form-control" name="message" rows="10" 
                                placeholder="Enter text ..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success m-t-20"><i class="far fa-envelope"></i> Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

{{-- <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script> --}}
{{-- <script type="text/javascript">

    $(document).ready(function() {

        $(document).on('change','.member',function(){

            var member_id = $(this).val();

            var a = $(this).parents();

            console.log(member_id);

            $.ajax({
                type: 'get',
                url: '{!!URL::to('findContact')!!}',
                data: {'id':member_id},
                dataType: 'json',
                success:function(data){

                    console.log('phone');

                    console.log(data.phone);

                    a.find('#contact').val(data.phone);
                },
                error:function(){

                }
            });
            
        });
        
    });
    
</script> --}}

<script src="{{ asset('admin/assets/plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
<script>
$(document).ready(function() {

    $('.textarea_editor').wysihtml5();

});
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