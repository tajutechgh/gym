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
                <h3>about us</h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active">about us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--//=== breadcrumb-section Finesh ===//-->
<!--//=== gym Agency section ===//-->
<section class="respons-pad padT100 padB90">
    <div class="detail-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 pull-right">
                    <figure class="banner-respons">
                        <img src="{{ asset('user/assets/img/sevices/service-img.png') }}" alt="">
                    </figure>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="about-sec-box">
                        <h3>About Us</h3>
                        <div class="padT20">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                        <div class="padT10">
                            <p>t to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                        </div>
                        <div class="padT10">
                            <p>t to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                        </div>
                        <div class="padT10">
                            <p>t to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//=== gym Agency section Finish ===//-->
<!--//=== team Section ===//-->
<section>
    <div class="team-section">
        <div class="trainer-box padT100 padB100">
            <div class="container">
                <div class="row">
                    <div class="headding-section padB50">
                        <div class="headding-box">
                            <div class="headding-texts">
                                <i class="fa fa-circle left-icon" aria-hidden="true"></i>
                                <h3>Our Trainers</h3>
                                <i class="fa fa-circle right-icon" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div id="trainers" class="owl-carousel owl-theme">
                        @forelse ($trainers as $trainer)
                            <div class="item">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="team">
                                        <figure class="team-img">
                                            <img src="{{Storage::disk('local')->url($trainer->image)}}" style="height: 260px;">
                                            <figcaption class="team-icon">
                                                <ul>
                                                    <li><a href="" class="team-circle marL10"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="" class="team-circle marL10"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="" class="team-circle marL10"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="" class="team-circle marL10"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="trainer padT20 padB20">
                                            <h4><a href="trainer-detail.html">{{$trainer->name}}</a></h4>
                                            <h5>Certified Instructor</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4>No trainers available.</h4> 
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//=== team Section Finish ===//-->
<!--//=== Our Partners ===/-->
<section class="padB100 padT100">
    <div class="partner-section">
        <div class="container">
            <div class="row">
                <div class="headding-section padB50">
                    <div class="headding-box">
                        <div class="headding-texts">
                            <i class="fa fa-circle left-icon" aria-hidden="true"></i>
                            <h3>Our Equipments</h3>
                            <i class="fa fa-circle right-icon" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div id="partners" class="owl-carousel owl-theme">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e1.jpeg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e2.jpg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e3.jpg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e4.jpg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e5.jpg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e6.jpg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e7.jpg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-border">
                            <figure>
                                <img src="{{ asset('user/assets/img/partner/e8.jpg') }}" style="height: 150px;">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//=== Our partners  Finish ===//-->

@endsection
