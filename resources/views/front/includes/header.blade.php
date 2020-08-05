<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$setting->title}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('front/css/style-ar.css')}}">
        <link href="//db.onlinewebfonts.com/c/7d411bb0357d6fd29347455b7d207995?family=JF+Flat" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('front/css/bootstrap-rtl.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Cairo', sans-serif;
                font-size: 17px;
            }
        </style>
    @endif
    <script src="{{asset('front/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('front/js/respond.min.js')}}"></script>

</head>
<body>
<div class="navv">
    <div class="container ">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="logo-div">
                <a class="navbar-brand" href="#">
                    <img src="{{$setting->image_path}}" alt="">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/')}}"><span class="list-item-home current"> @lang('site.home')</span> </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link"> <span class="list-item-ser "> @lang('site.our_service')</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><span class="list-item-cont ">@lang('site.contact_us')</span></a>
                    </li>
                    <li class="nav-item ">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if(app()->getLocale()=='en'&&$localeCode=='en')
                                <?php continue; ?>
                                <a class="nav-link language "
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    ar
                                </a>
                            @else
                                <a class="nav-link language "
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    @if(app()->getLocale()=='ar')
                                        en
                                    @else
                                        ar
                                    @endif
                                </a>
                                <?php break; ?>
                            @endif

                        @endforeach
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
