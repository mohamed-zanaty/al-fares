@extends('layouts.master')

@section('content')


    <!-- start works -->
    <div class="container">
        <div class="works ">
            <div class="row">
                <div class=" col-lg-4">
                    <div class="header" style="
    margin: 20px;">

                        <div>
                            <span style=" color: white; font-size: 28px; font-weight: bold">
                                - {{$category->name}}
                            </span>
                            <br>
                            <span style="color: white">{!! $category->description !!}</span>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="carousel-inner" style="" >

                        <div class="">

                            <img class="d-block w-100 my-image image-feature"
                                 src="{{$category->image_path}}" style=" background: transparent" alt="First slide">
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
                @foreach($products as  $index=>$product)
                    @if(!$product->link )
                        <div class="col-lg-4" style=" margin-bottom: 50px">
                            <div style="text-align: center;
    color: white;
    font-size: 22px;
    margin: 0; ">{{$product->title}}</div>
                            <div style="font-size: 10px ;text-align: center; "><span
                                    style="margin: 5px 5px 0 5px; display: inline-block; color: #fff; font-size: 12px!important; ">
                                {!! $product->description !!}
                            </span>
                            </div>
                            <div class="ser-div" style="height: 100%; margin-top: 10px">
                                <img src="{{$product->image_path}}" class="my-image" style="z-index: 3" alt="">
                            </div>

                        </div>
                    @else
                        <div class="col-lg-4" style=" margin-bottom: 50px; position: relative">
                            <div style="text-align: center;
    color: white;
    font-size: 22px;
    margin: 0; ">{{$product->title}}</div>
                            <div style="font-size: 10px ;text-align: center; "><span
                                    style="margin: 5px 5px 0 5px; display: inline-block; color: #fff; font-size: 12px!important; ">
                                {!! $product->description !!}
                                </span>
                            </div>

                            <div class="ser-div vid-preview" style="height: 100%; margin-top: 10px; z-index: 10" id="img-{{$index}}"
                                 data-videourl="{{str_replace('watch?v=', 'embed/',$product->link)}}">
                                <img src="{{$product->image_path}}"
                                     style="z-index: 3" alt="">
                                <div class="vid-style"><i class="fa fa-play-circle video-inc" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


    <!-- end services -->

@stop
