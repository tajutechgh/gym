@extends('user.layouts.master')

@section('main-content')

<!--//=== breadcrumb-section ===//-->
<div class="detail-section">
    <div class="container-fluid">
        <div class="row ">
            <div class="special-style special-style-dark col-md-12 breadcrumb-img-section">
                <div class="bg-image" style="background-image:url('{{ asset('user/assets/img/all/breadcrumb-img.jpg') }}');">
                </div>
            </div>
            <div class="breadcrumb-section text-center padT200 padB100">
                <h3>Our collections</h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active">collections</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--//=== breadcrumb-section Finesh ===//-->
<!--//======== Side bar head start ======//-->
<section>
    <div class="container padTB100 padB50">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="detail-section grid-bg">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-10 col-sm-7 col-xs-12">
                            <div class="grid-select-1" style="padding:22px 0px;">
                                <a href="{{ route('product') }}"><i class="fa fa-th lh" style="margin:0px 5px;" aria-hidden="true"></i></a>
                            </div>
                            <div class="grid-select-1" id="txt">
                                <h4>You can contact us to get any of our fitness products.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//======== Side bar head End ======//-->
<!--//=========Products  section start=========//-->
<section class="padT10 padB100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="team marB30">
                                <figure class="team-img">
                                    <img src="{{Storage::disk('local')->url($product->image)}}" style="height: 300px;">
                                    <figcaption class="team-icon">
                                        <ul>
                                            <li><a href="" class="team-circle marL10"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                            <li><a href="" class="team-circle marL10"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            <li><a href="" class="team-circle marL10"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
                                            <li><a href="" class="team-circle marL10"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                                <div class="trainer price-bar padT20 padB20">
                                    <h4><a href="product-page.html">{{$product->name}}</a></h4>
                                    <h5>GH₵ {{$product->price}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div align="center">
                {{$products->links()}}
            </div>
        </div>
    </div>
</section>
<!--//=========Products section Ends =========//-->

@endsection
