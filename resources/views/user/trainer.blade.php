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
                <h3>Our Trainers</h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active">Trainers</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--//=== breadcrumb-section Finesh ===//-->
<!--//===Our Trainer Section ===//-->
<section class="padB100 padT100">
    <div class="trainer-grid-section">
        <div class="container">
            <div class="row">
                @foreach ($trainers as $trainer)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="team marB30">
                            <figure class="team-img">
                                <img src="{{Storage::disk('local')->url($trainer->image)}}" style="height: 300px;">
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
                @endforeach
            </div>
            {{-- pagination --}}
            <div align="center">
                {{$trainers->links()}}
            </div>
        </div>
    </div>
</section>
<!--//===Our Trainer Section Finish===//-->

@endsection
