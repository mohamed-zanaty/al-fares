<!-- start contact -->
<div class="container" style="margin-top: 100px">

    <div class="row">
        <div class="col-lg-4">
            <div class="logo" style="text-align: center">
                <img style="max-width: 100%" src="{{$setting->image_path}}" alt="">
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
<div class="footer" style="text-align: center">
    <div class="social-media" style="text-align: center" >
        <a href="{{$setting->facebook}}" style="margin: 15px">
            <i class="fa fa-facebook" style="font-size: 25px"></i>
        </a>
        <a href="{{$setting->instagram}}" style="margin: 15px">
            <i class="fa fa-instagram" style="color: purple;font-size: 25px"></i>
        </a>
        <a href="{{$setting->twitter}}" style="margin: 15px">
            <i class="fa fa-twitter" style="color: cornflowerblue;font-size: 25px"></i>
        </a>
        <a href="{{$setting->number1}}" style="margin: 15px">
            <i class="fa fa-phone" style="color: white;font-size: 25px"></i>
        </a>
        <a href="{{$setting->number2}}" style="margin: 15px">
            <i class="fa fa-phone" style="color: white;font-size: 25px"></i>
        </a>
        <a href="{{$setting->youtube}}" style="margin: 15px">
            <i class="fa fa-youtube" style="color: red;font-size: 25px"></i>
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
<script>
    Zoomerang.listen('.my-image')
</script>
</body>
</html>



