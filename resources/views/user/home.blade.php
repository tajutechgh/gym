@extends('user.layouts.master')

@section('main-content')

<!--//=== Header Slider ===//-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div id="banner" class="owl-carousel owl-theme">
                        <div class="item">
                            <figure class="banner-box">
                                <img src="{{ asset('user/assets/img/slider/img2.jpg') }}" alt="">
                            </figure>
                            <div class="banner-main-headding">
                                <div class="container">
                                    <div class="banner-text">
                                        <h3>Your Body Fit</h3>
                                        <h1>Make Your Body <br><span>Stronger</span></h1>
                                        <div class="slider-btn">
                                            <a href="contact.html" class="itg-button-2">contact us now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <figure class="banner-box">
                                <img src="{{ asset('user/assets/img/slider/img2.jpg') }}" alt="">
                            </figure>
                            <div class="banner-main-headding">
                                <div class="container">
                                    <div class="banner-text">
                                        <h3>Your Body Fit</h3>
                                        <h1>Make Your Body <br><span>Stronger</span></h1>
                                        <div class="slider-btn">
                                            <a href="contact.html" class="itg-button-2">contact us now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <figure class="banner-box">
                                <img src="{{ asset('user/assets/img/slider/img2.jpg') }}" alt="">
                            </figure>
                            <div class="banner-main-headding">
                                <div class="container">
                                    <div class="banner-text">
                                        <h3>Your Body Fit</h3>
                                        <h1>Make Your Body <br><span>Stronger</span></h1>
                                        <div class="slider-btn">
                                            <a href="contact.html" class="itg-button-2">contact us now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//=== Header Slider Finesh ===//-->
<div class="clear"></div>
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
                        <a href="{{ route('about') }}" class="itg-button-2 marT20">Learn More</a>
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
<!--//=== Our Class Section ===//-->
<section class="respons-pad padT100 padB70">
    <div class="detail-section">
        <div class="container">
            <div class="row">
                <div class="headding-section padB50">
                    <div class="headding-box">
                        <div class="headding-texts">
                            <i class="fa fa-circle left-icon" aria-hidden="true"></i>
                            <h3>OUR CLASSES</h3>
                            <i class="fa fa-circle right-icon" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                @forelse ($classes as $class)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="our-team-effect padB30">
                            <figure class="overly-hover-1">
                                <img src="{{Storage::disk('local')->url($class->image)}}" style="height: 300px;">
                                <div class="our-team-btn">
                                    <a href="{{ route('class') }}" class="itg-button-3">read more</a>
                                </div>
                            </figure>
                            <div class="our-team padT20 padB20">
                                <h4><a href="class-detail.html">{{$class->name}}</a></h4>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>No classes available.</h4>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!--//=== Our Class Section Finish ===//-->
<!--//=== banner Section ===//-->
<div class="banner-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="special-style special-style-dark">
                        <div class="bg-image parallax-style" style="background-image:url('{{ asset('user/assets/img/banner/banner-1.jpg') }}');"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="banners-box">
                        <div class="banner-text-sec">
                            <p>Make Your Body Fit</p>
                        </div>
                        <div class="banners-text-1">
                            <p>Benefits of GYM</p>
                        </div>
                        <div class="banner-btn-1">
                            <a href="contact.html" class="itg-button-7">contact us now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//=== banner Section Finish ===//-->
<!--//=== gallery Section ===//-->
<section class="padT100 padB100">
    <div class="gallery-section">
        <div class="container">
            <div class="row">
                <div class="headding-section padB50">
                    <div class="headding-box">
                        <div class="headding-texts">
                            <i class="fa fa-circle left-icon" aria-hidden="true"></i>
                            <h3>OUR GALLERY</h3>
                            <i class="fa fa-circle right-icon" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            @forelse ($galleries as $gallery)
                <div class="col-md-4 col-sm-4 col-xs-12 pad0">
                    <div class="gallery-box">
                        <figure class="gallery-hover">
                            <img src="{{Storage::disk('local')->url($gallery->image)}}" style="height: 250px;">
                            <figcaption class="hover-serach-icon">
                                <a href="{{Storage::disk('local')->url($gallery->image)}}" class="fancybox" data-fancybox-group="group"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            @empty
                <h4>No pictures available.</h4>
            @endforelse
        </div>
    </div>
</section>
<!--//=== gallery Section Finish ===//-->
<!--//=== Product Section ===//-->
<section>
    <div class="product-section padT100 padB70">
        <div class="container">
            <div class="row">
                <div class="headding-section padB50">
                    <div class="headding-box">
                        <div class="headding-texts">
                            <i class="fa fa-circle left-icon" aria-hidden="true"></i>
                            <h3>FITNESS PRODUCTS</h3>
                            <i class="fa fa-circle right-icon" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                @forelse ($products as $product)
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
                            <div class="trainer padT20 padB20">
                                <h4><a href="product-page.html">{{$product->name}}</a></h4>
                                <h5>GH₵ {{$product->price}}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>No products available.</h4>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!--//=== Product Section Finish ===//-->
<!--//=== Testimonals-section ===//-->
<section>
    <div class="testimonal-section padTB100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12 padB50 col-md-offset-3 col-sm-offset-2 col-xs-offset-0">
                    <div class="theme-headding-section">
                        <h3>Testimonials</h3>
                        <p>What our clients are saying about us.</p>
                    </div>
                </div>
                <div class="clear"></div>
                <div id="testimonial" class="owl-carousel owl-theme">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="testimonal-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <figure>
                                        <img src="{{ asset('user/assets/img/all/testimonial0.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8 padT20 client-nane-hed">
                                    <h5><a href="index-1.html#">JONE SMITH</a></h5>
                                    <p>a member</p>
                                </div>
                                <div class="col-md-12 padT15">
                                    <p>Lorem Ipsum is simply dummy text the printing an typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="testimonal-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <figure>
                                        <img src="{{ asset('user/assets/img/all/testimonial1.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8 padT20 client-nane-hed">
                                    <h5><a href="index-1.html#">JONE SMITH</a></h5>
                                    <p>a member</p>
                                </div>
                                <div class="col-md-12 padT15">
                                    <p>Lorem Ipsum is simply dummy text the printing an typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="testimonal-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <figure>
                                        <img src="{{ asset('user/assets/img/all/testimonial2.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8 padT20 client-nane-hed">
                                    <h5><a href="index-1.html#">JONE SMITH</a></h5>
                                    <p>a member</p>
                                </div>
                                <div class="col-md-12 padT15">
                                    <p>Lorem Ipsum is simply dummy text the printing an typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="testimonal-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <figure>
                                        <img src="{{ asset('user/assets/img/all/testimonial1.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8 padT20 client-nane-hed">
                                    <h5><a href="index-1.html#">JONE SMITH</a></h5>
                                    <p>a member</p>
                                </div>
                                <div class="col-md-12 padT15">
                                    <p>Lorem Ipsum is simply dummy text the printing an typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//=== Testimonals-section Finish ===//-->
<div class="clear"></div>
<!--//=== Priceing Section ===//-->
<section>
    <div class="priceing-section padT100 padB70">
        <div class="container">
            <div class="row">
                <div class="headding-section padB50">
                    <div class="headding-box">
                        <div class="headding-texts">
                            <i class="fa fa-circle left-icon" aria-hidden="true"></i>
                            <h3>membership pricing</h3>
                            <i class="fa fa-circle right-icon" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                @foreach ($memberships as $membership)
                    <div class="col-md-3 col-sm-6 col-xs-12 marB30">
                        <div class="priceing-box">
                            <div class="priceing-head text-center">
                                <h4>{{$membership->name}}</h4>
                            </div>
                            <div class="priceing-feature padT50 padB40">
                                <ul>
                                    <h4>{{$membership->days}} Day(s)</h4>
                                </ul>
                            </div>
                            <div class="priceing-heading-box">
                                <h1><sup class="price-text-dolar">GH₵</sup>{{$membership->price}}<sub class="price-text-month">/{{$membership->instalment_plan}}</sub></h1>
                            </div>
                            <div class="priceing-head box text-center">
                                <h4>Get Started Now</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--//=== Priceing Section Finish ===//-->
<div class="clear"></div>
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
<div class="clear"></div>
<div class="clear"></div>

@endsection
