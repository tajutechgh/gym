@extends('user.layouts.master')

@section('main-content')

<!--//=== breadcrumb-section ===//-->
<div class="detail-section">
    <div class="container-fluid">
        <div class="row ">
            <div class="special-style special-style-dark col-md-12 breadcrumb-img-section">
                <div class="bg-image" style="background-image:url('{{ asset('user/assets/img/all/breadcrumb-img.jpg') }}');"></div>
            </div>
            <div class="breadcrumb-section text-center padT200 padB100">
                <h3>contact us</h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active">contact us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--//=== breadcrumb-section Finesh ===//-->
<!--//=== Map Section ===//-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div id='gmap_canvas'></div>
            </div>
        </div>
    </div>
</div>
<!--//=== Map Section finish ===//-->
<section class="padTB100">
    <div class="container">
        @include('include.message')
        <div class="row">
            <div class="contact-text">
                <h3>send us a message</h3>
            </div>
            <form action="{{ route('storecontact') }}" method="post">
                {{csrf_field()}}
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="post-gray">
                        <input type="text" name="name" value="" placeholder="Full Name" required=""> 
                        <input type="text" name="phone" value="" placeholder="Phone Number" required=""> 
                        <input type="text" name="title" value="" placeholder="Title" required=""> 
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="post-gray marT20">
                        <textarea placeholder="Type message here......" name="message" rows="5" cols="50" required=""></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12 marT30">
                    <button type="submit" class="itg-button-3">send message</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
