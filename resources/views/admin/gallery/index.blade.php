@extends('admin.layouts.master')

@section('head')

<!-- Popup CSS -->
<link href="{{ asset('admin/assets/plugins/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">
<!-- page css -->
<link href="{{ asset('admin/css/pages/user-card.css') }}" rel="stylesheet">

@endsection

@section('main-content')

@section('title','Gallery')

@section('sub-title','Gallery')

@can('user.galleryaction', Auth::user())
<div class="pull-left">
    <!-- add modal content button-->
    <button type="button" class="btn btn-success fa fa-plus-circle" data-toggle="modal" data-target="#myModal">Add Photo
    </button>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-content">
              <div class="modal-header" align="center">
                <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
              </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Image Name:</label>
                        <input type="text" name="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" required="">
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
<br><br>
@include('include.message')
<div class="row el-element-overlay">
    @foreach ($galleries as $gallery)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"> <img src="{{Storage::disk('local')->url($gallery->image)}}" 
                        alt="user" style="height: 200px;" />
                        <div class="el-overlay">
                            <ul class="el-info">
                                <li>
                                    <a class="btn default btn-outline image-popup-vertical-fit" href="{{Storage::disk('local')->url($gallery->image)}}"><i class="icon-magnifier"></i></a>
                                </li>
                                <li>
                                    @can('user.galleryaction', Auth::user())
                                    {{-- delete button --}}
                                    <form method="post" id="delete-form-{{$gallery->id}}" action="{{route('gallery.destroy', 
                                    $gallery->id)}}" 
                                    style="display: none;">
                                    
                                    {{csrf_field()}}

                                    {{method_field('DELETE')}}

                                    </form>
                                    
                                    <a href="" onclick="
                                        if(confirm('Are yoy sure, You want to delete this image?')){
                                          event.preventDefault();document.getElementById('delete-form-{{$gallery->id}}').submit();
                                        }else{
                                          event.preventDefault();
                                        }" class="fa fa-trash-o btn btn-danger">
                                    </a>
                                    @endcan
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="el-card-content">
                        <h3 class="box-title">{{$gallery->name}}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- pagination start --}}
<div class="col-md-6 col-md-offset-3 text-center">
    {{$galleries->links()}}
</div>
{{-- pagination end --}}

@endsection

@section('footer')

<!-- Magnific popup JavaScript -->
<script src="{{ asset('admin/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>

@endsection