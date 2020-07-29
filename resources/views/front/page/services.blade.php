@extends('layouts.master')

@section('content')


    <!-- start works -->
    <div class="container">
        <div class="works ">
            <div class="row">
                <div class=" col-lg-3">
                    <div class="header">
                        <h1 style="font-size: 40px">
                            @lang('site.category') :
                        </h1>
                        <div>
                            <span style=" color: white; font-size: 25px">
                                - {{$category->name}}
                            </span>
                            <br>
                            <span style="color: white">{!! $category->description !!}</span>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                            <div class="carousel-inner" style="max-height: 100%; height: 500px">

                                    <div class="" style="height: 100%">
                                        <img class="d-block w-100 my-image "
                                             src="{{$category->image_path}}" style="height: 100% !important;" alt="First slide">
                                    </div>

                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end works -->



    {{--start services    --}}
    <div class="container" style="margin-top: 100px">
        <div class="services">
            <div class="header">
                <h1>
                    @lang('site.our_work')
                </h1>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4" style=" margin-bottom: 50px">
                        <div style="text-align: center;
    color: white;
    font-size: 22px;
    margin: 0; ">{{$product->title}}</div>
                        <div  style="font-size: 10px ;text-align: center; "><span
                                style="margin: 5px 5px 0 5px; display: inline-block; color: #fff; font-size: 12px!important; ">
                                {!! $product->description !!}
                            </span>
                        </div>
                        <div class="ser-div" style="height: 100%; margin-top: 10px">
                            <img src="{{$product->image_path}}" class="my-image" style="z-index: 3" alt="">
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- end services -->

@stop
