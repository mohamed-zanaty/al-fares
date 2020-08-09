@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{__('site.setting')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('site.main')}}</a>
                                </li>
                                <li class="breadcrumb-item"> {{__('site.setting')}}
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">  {{__('site.edit')}} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('dashboard.includes.alerts.errors')

                                <form action="{{route('setting.update',$setting->id)}}" method="post"
                                      style="padding: 20px" enctype="multipart/form-data">

                                    @csrf
                                    @method('put')

                                    <div class="form-group">
                                        <label>  {{__('site.email')}} </label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ $setting->email}}">
                                    </div>






                                    <div class="form-group">
                                        <label>  {{__('site.name')}}</label>
                                        <input name="name" class="form-control"
                                               value="{{ $setting->title}}">
                                    </div>


                                    <div class="form-group">
                                        <label>  {{__('site.number')}} </label>
                                        <input name="number" class="form-control"
                                               value="{{ $setting->number}}">
                                    </div>



                                    <div class="form-group">
                                        <label>facebook</label>
                                        <input name="facebook" class="form-control"
                                               value="{{ $setting->facebook}}">
                                    </div>


                                    <div class="form-group">
                                        <label>twitter</label>
                                        <input name="twitter" class="form-control"
                                               value="{{ $setting->twitter}}">
                                    </div>


                                    <div class="form-group">
                                        <label>instagram</label>
                                        <input name="instagram" class="form-control"
                                               value="{{ $setting->instagram}}">
                                    </div>


                                    <div class="form-group">
                                        <label>youtube</label>
                                        <input name="youtube" class="form-control"
                                               value="{{ $setting->youtube}}">
                                    </div>

                                    <div class="form-group">
                                        <label>  {{__('site.image')}}</label>
                                        <input type="file" name="image" class="form-control image">
                                    </div>

                                    <div class="form-group">
                                        <img src="{{ $setting->image_path }}" style="width: 100px"
                                             class="img-thumbnail image-preview" alt="">
                                    </div>


                                    <div class="form-group">

                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-plus"></i> @lang('site.update')</button>

                                    </div>
                                </form><!-- end of form -->

                            </div><!-- end of card -->

                        </div><!-- end of col -->


                    </div><!-- end of row -->

                </section>

            </div>


        </div>
    </div><!-- end of content wrapper -->

@endsection

