@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            @hasrole('Resident')
            <h3 class="p-2 text-center">Mis reservas</h3>
            @endhasrole
            @hasrole('Administrator')
            <h3 class="p-2 text-center">Reservas</h3>
            @endhasrole
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <p style="font-size: 20px" class="text-center">Seleccione un servicio:</p>
                <div class="col-auto">
                        <div class="row">
                            @foreach($services as $service)
                              <div class="col-md-3">
                                <a style="width:220px; padding:10px; margin:10px;border-radius: 20px;"  class="btn btn-success" href="/detailBooking/{{$service->id}}">{{ $service->title }}</a>
                              </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
