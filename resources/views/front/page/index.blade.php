@extends('layouts.master')

@section('content')
    <!-- start works -->
    <!-- start works -->
    <div class="container">
        <div class="works ">
            <div class="row">
                <div class=" col-lg-3">
                    <div class="header">
                        <h1>
                            @lang('site.latest_work')
                        </h1>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="slider">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" style="max-height: 100%; height: 500px">
                                @foreach($features as $index=>$feature)
                                    <div class="carousel-item {{$index == 0 ? 'active' : ''}}" style="height: 100%">
                                        <img class="d-block w-100 my-image "
                                             src="{{$feature ->image_path}}" style="height: 100% !important;" alt="First slide">
                                    </div>
                                @endforeach
                            </div>

                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end works -->

    <!-- start services -->
    <div class="container">
        <div class="services">
            <div class="header">
                <h1>
                    @lang('site.our_service')
                </h1>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-4" style=" margin-bottom: 30px">
                            <a href="{{route('service.show',$category->id)}}">
                            <div class="ser-div"  style="height: 100%;" >

                                <div class="ser-back" style="height: 100%">{{$category->name}}</div>
                                <img  src="{{$category->image_path}}" class="my-image" style="" alt="">
                            </div>
                            </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- end services -->

@stop
