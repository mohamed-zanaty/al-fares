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
                        <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" >
                                @foreach($features as $index=>$feature)
                                    <div class="carousel-item {{$index == 0 ? 'active' : ''}}"  >
                                        <img class="d-block w-100 my-image image-feature " style="margin: auto"
                                             src="{{$feature ->image_path}}"
                                             alt="First slide">
                                    </div>
                                @endforeach
                            </div>

                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active owl"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="owl"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2" class="owl"></li>
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
                    <div class="col-lg-4" style=" ">

                        <a href="{{route('service.show',$category->id)}}">
                            <div class="ser-div">
                                <div class="ser-back {{ strlen($category->name) > 19 ? "websites" : '' }}">{{$category->name}}</div>
                                <img src="{{$category->image_path}}" alt="">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- end services -->

@stop
