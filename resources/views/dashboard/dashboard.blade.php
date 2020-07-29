@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="row">
                <div class=" col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{$categories}}</h3>
                                        <h6>{{__('site.categories')}}</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                         style="width: {{$categories}}%"
                                         aria-valuenow="{{$categories}}" aria-valuemin="0" aria-valuemax="20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class=" col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$jobs}}</h3>
                                        <h6>{{__('site.works')}}</h6>
                                    </div>
                                    <div>
                                        <i class="icon-power success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                         style="width: {{$jobs}}%"
                                         aria-valuenow="{{$jobs}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class=" col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$admins}}</h3>
                                        <h6>{{__('site.moderator')}}</h6>
                                    </div>
                                    <div>
                                        <i class="icon-users success font-large-2 float-right"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$contact}}</h3>
                                        <h6>{{__('site.contact')}}</h6>
                                    </div>
                                    <div>
                                        <i class="icon-action-redo success font-large-2 float-right"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection
