@extends('user.layouts.master')

@section('main-content')

<!--//=== breadcrumb-section ===//-->
<div class="detail-section">
    <div class="container-fluid">
        <div class="row ">
            <div class="special-style special-style-dark dark-overlay-1 col-md-12">
                <div class="bg-image" style="background-image:url('{{ asset('user/assets/img/banner/banner.jpg') }}');"></div>
            </div>
            <div class="breadcrumb-section text-center padT200 padB100">
                <h3>our classes</h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active">our classes</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--//=== breadcrumb-section Finesh ===//-->
<section>
    <div class="container padTB100 padB50">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="detail-section grid-bg">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="grid-section">
                                <ul>
                                    <li><a href="{{ route('class') }}"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-6">
                            <div class="row">
                                <div class="grid-section-1">
                                    <h4>Our Classes and thier details</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="padB70">
    <div class="container">
        <div class="row">
            @foreach ($classes as $class)
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="detail-section padB30">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="row">
                                <figure class="class-img">
                                    <img src="{{Storage::disk('local')->url($class->image)}}" style="height: 229px;">
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="row">
                                <div class="class-list" style="width: 15cm;">
                                    <div class="blog-detail marB20">
                                        <h4><a href="{{ route('class') }}">{{$class->name}}</a></h4>
                                    </div>
                                    <div class="blog-full">
                                        <P><i class="fa fa-users">
                                            <?php $count = 0; ?>
                                            @forelse ($class->members as $member)
                                                <?php if ($count == 1) break; ?>
                                                    {{$member->where('class_id',$member->class_id)->count()}}
                                                <?php $count++; ?>
                                            @empty
                                                0
                                            @endforelse
                                            members registered.
                                        </i></p>
                                        <P><i class="fa fa-calendar">
                                            @foreach ($class->days as $day)
                                                {{$day->name}},
                                            @endforeach
                                        </i></p>
                                        <p><i class="glyphicon glyphicon-time">
                                            {{$class->start_time}} - {{$class->end_time}}
                                        </i></p>
                                        <div class="blog-detail">
                                            <span>Trainer: <a href="{{ route('class') }}">{{$class->user['name']}}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- pagination --}}
        <div align="center">
            {{$classes->links()}}
        </div>
    </div>
</section>

@endsection
