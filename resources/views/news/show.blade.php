@extends('layouts.dashboard')
@section('content')
    @if(Session::has('successNewsStore'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successNewsStore') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize py-4">
                                NOTICIAS
                            </h6>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10">
                                    <div class="row">
                                        @foreach ($news as $value)
                                        <div class="col-md-12 mt-4 mb-3">
                                            <p style="font-size: 12px;" class="text-uppercase">{{$value->author.' · '.$value->created_at}}</p>
                                            <h3 class="text-center">{{$value->title}}</h3>
                                            {!! $value->description !!}
                                            <div class="d-flex justify-content-center">
                                                <img class="mt-3 rounded" width="80%" src="{{getenv('APP_URL').$value->url_image}}">
                                            </div>
                                            <hr>
                                        </div>
                                        @endforeach
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
