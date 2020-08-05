@extends('layouts.dashboard')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{__('site.contact')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('site.main')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('site.contact')}}
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
                                    <h4 class="card-title">{{__('site.message')}} </h4>
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>

                                                <th>{{__('site.email')}}</th>
                                                <th>{{__('site.number')}}</th>
                                                <th>{{__('site.data')}}</th>
                                                <th>{{__('site.message')}}</th>
                                                <th>{{__('site.action')}}</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($contacts)
                                                @foreach($contacts as $contact)
                                                    <tr>
                                                        <td>{{$contact -> email}}</td>
                                                        <td>{{$contact -> phone}}</td>
                                                        <td>{{$contact -> created_at->format('Y-m-d')}}</td>
                                                        <td>{{$contact -> message}}</td>
                                                        <td>

                                                            <form
                                                                action="{{route('contact.destroy',$contact -> id)}}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button
                                                                    class="btn btn-outline-danger btn-sm  box-shadow-3 mr-1 mb-1">
                                                                    {{__('site.delete')}}
                                                                </button>

                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection

