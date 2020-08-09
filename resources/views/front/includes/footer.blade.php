<!-- start contact -->
<div class="container" style="margin-top: 100px">

    <div class="row">
        <div class="col-lg-4">
            <div class="logo" style="text-align: center">
                <img style="max-width: 100%; {{app()->getLocale() == 'ar'?  'transform:  rotateY(180deg);' : ''}}" src="{{$setting->image_path}}" alt="">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="contact-form">
                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')
                <form class="contact-form" id="form" action="{{route('save')}}" method="post">
                    <h2> @lang('site.contact_us')</h2>
                    <div class="form">
                        @csrf
                        <div>
                            <label for="email"> @lang('site.email')</label>
                            <input type="text" id="email" placeholder="{{__('site.email_enter')}}" name="email"
                                   required="required">
                        </div>
                        <div>
                            <label for="MobileNO">@lang('site.phone')</label>
                            <input type="text" id="MobileNO" placeholder="{{__('site.optional')}}" name="phone"
                                   required="required">
                        </div>
                        <div>
                            <label for="message">@lang('site.msg')</label>
                            <textarea id="subject" name="message" placeholder="{{__('site.write_msg')}}"
                                      style="height:200px"></textarea>
                        </div>
                        <div class="button">
                            <input type="submit" value="{{__('site.contact_us')}}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- end contact -->
<!-- start footer -->
<div class="footer" style="background: #4c5059!important;">
    <div class="social-media" >
        <a href="{{$setting->facebook}}" target="_blank">
            <i class="fa fa-facebook" ></i>
        </a>

        <a href="{{$setting->instagram}}"  target="_blank">
            <i class="fa fa-instagram" ></i>
        </a>
        <a href="{{$setting->twitter}}" target="_blank" >
            <i class="fa fa-twitter" ></i>
        </a>
        <a href="{{$setting->number}}" target="_blank" >
            <i class="fa fa-phone" ></i>
        </a>

        <a href="{{$setting->youtube}}" target="_blank" >
            <i class="fa fa-youtube" ></i>
        </a>
    </div>
</div>
<!-- end footer -->

<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<script src="{{ asset('front/js/zoomerang.js') }}"></script>
<script src="{{asset('front/video/youtube-overlay.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
<script>
    Zoomerang.listen('.my-image');

    function src(){
        $( "#close" ).attr({ "src" : "{{asset('front/video/x-mark-black-icon.svg')}}" });
        console.log("{{asset('front/video/x-mark-black-icon.svg')}}")
    }

</script>
</body>
</html>



