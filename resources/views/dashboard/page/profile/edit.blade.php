@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المدونه </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('site.edit')}}
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
                                <div class="card-header" style="margin-bottom: 20px">

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

                                <div class="form-group">

                                    <ul class="nav nav-pills nav-active-bordered-pill nav-justified">
                                        <li class="nav-item"><a
                                                class="active nav-link"
                                                id="edit-pill"
                                                href="#edit1-pill"
                                                data-toggle="pill">@lang('site.detail')</a></li>

                                        <li class="nav-item"><a
                                                class="nav-link"
                                                id="pass1-pill"
                                                href="#pass-pill"
                                                data-toggle="pill">@lang('site.password')</a></li>

                                    </ul>


                                    <div class="tab-content px-1 pt-1">


                                        <div role="tabpanel" class="tab-pane active"
                                             id="edit1-pill"
                                             aria-labelledby="edit-pill"
                                             aria-expanded="true">

                                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('profile.update')}}" enctype="multipart/form-data"
                                                  method="post">
                                                {{csrf_field()}}
                                                {{ method_field('put') }}
                                                <div class="m-portlet__body">

                                                    <div class="form-group m-form__group row">
                                                        <div class="col-10 ml-auto">
                                                            <h3 class="m-form__section">

                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            @lang('site.name')
                                                        </label>
                                                        <div class="col-7">
                                                            <input class="form-control m-input" type="text" value="{{auth('admin')->user()->name}}"
                                                                   name="name" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            @lang('site.email')

                                                        </label>
                                                        <div class="col-7">
                                                            <input class="form-control m-input" type="email"
                                                                   value="{{auth('admin')->user()->email}}" name="email" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            @lang('site.image')

                                                        </label>
                                                        <div class="col-7">
                                                            <input type="file" name="image" class="form-control image">

                                                            <img src="{{auth('admin')->user()->image_path}}" style="width: 100px"
                                                                 class="img-thumbnail image-preview" alt="">
                                                        </div>
                                                    </div>



                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            @lang('site.password')

                                                        </label>
                                                        <div class="col-7">
                                                            <input class="form-control m-input" type="password" name="password"
                                                                   required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-plus"></i> @lang('site.edit')</button>
                                                </div>
                                            </form>


                                        </div>




                                        <div role="tabpanel" class="tab-pane "
                                             id="pass-pill"
                                             aria-labelledby="pass1-pill"
                                             aria-expanded="true">

                                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('profile.update.password')}}"
                                                  method="post">
                                                {{csrf_field()}}
                                                {{ method_field('put') }}


                                                <div class="form-group">
                                                    <label>@lang('site.old_password')</label>
                                                    <input type="password" name="old_password" class="form-control">
                                                </div>


                                                <div class="form-group">
                                                    <label>@lang('site.password')</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>@lang('site.password_confirmation')</label>
                                                    <input type="password" name="password_confirmation" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-plus"></i> @lang('site.edit')</button>
                                                </div>
                                            </form>

                                        </div>




                                    </div>
                                </div>
                            </div><!-- end of card -->

                        </div><!-- end of col -->


                    </div><!-- end of row -->

                </section>

            </div>
        </div>
    </div>

@endsection

