@extends('layouts.dashboard')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('bookingSuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('bookingSuccess') }}
            </div>
        @endif
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('dayFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('dayFail') }}
            </div>
        @endif
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('dateFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('dateFail') }}
            </div>
        @endif
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('quantityFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('quantityFail') }}
            </div>
        @endif
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('personsFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('personsFail') }}
            </div>
        @endif
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('limitPerDayFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('limitPerDayFail') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            Servicios de clubhouse
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                @if(Auth::user()->resident->status == 'Deshabilitado')
                    <div class="col-auto mt-5">
                        <h3 style="color:#ff0000">
                            Estimado residente usted no puede hacer uso de los servicios de clubhouse
                        </h3>
                    </div>
                @else
                    <div class="col-auto mt-5">
                    <table class="table table-responsive datatable" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th style="text-align: center; padding:10px;">Título</th>
                            <th style="text-align: center; padding:10px;">Descripción</th>
                            <th style="text-align: center; padding:10px;">Capacidad</th>
                            <th style="text-align: center; padding:10px;">Inicio</th>
                            <th style="text-align: center; padding:10px;">Cierre</th>
                            <th style="text-align: center; padding:10px;">Franja</th>
                            <th style="text-align: center; padding:10px;">Días hábiles</th>
                            <th style="text-align: center; padding:10px;">Estado</th>
                            <th style="text-align: center; padding:10px;">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service )
                                <tr>
                                    <td>
                                        <a class="service" href="http://portal.portoamericas.com/storage/{{substr($service->gallery, 7)}}">
                                            <img class="" style="width: 150px; border-radius: 5%;"  onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" src="http://portal.portoamericas.com/storage/{{substr($service->gallery, 7)}}">
                                        </a>
                                    </td>
                                    <td style="text-align: center; padding:10px;">{{ $service->title }}</td>
                                    <td style="text-align: center; padding:10px;">{{ $service->description }}</td>
                                    <td style="text-align: center; padding:10px;">{{ $service->capacity }} personas</td>
                                    <td style="text-align: center; padding:10px;">{{ $service->start }}</td>
                                    <td style="text-align: center; padding:10px;">{{ $service->final }}</td>
                                    <td style="text-align: center; padding:10px;">{{ $service->strip }} minutos</td>
                                    <td style="text-align: center; padding:10px;">
                                        <ul>
                                            @if ($service->monday == 1) <li> Lunes </li> @endif
                                            @if ($service->tuesday == 1) <li> Martes </li> @endif
                                            @if ($service->wednesday == 1) <li> Miércoles </li> @endif
                                            @if ($service->thursday == 1) <li> Jueves </li> @endif
                                            @if ($service->friday == 1) <li> Viernes </li> @endif
                                            @if ($service->saturday == 1) <li> Sábado </li> @endif
                                            @if ($service->sunday == 1) <li> Domingo </li> @endif
                                        </ul>
                                    </td>
                                    <td style="text-align: center; padding:10px;">
                                        @if ($service->state == 1)
                                            Habilitado
                                        @else
                                            Deshabilitado
                                        @endif
                                    </td>
                                    <td style="text-align: center; padding:10px;">
                                        @if ($service->state == 1)
                                        <div class="btn-group">
                                            <form method="POST" action="/bookings/schedule">
                                                @csrf
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                <input style="padding-right: 45%; width:50%; text-align: center;" class="btn btn-success btn-block" type="submit" value ="Reservar">
                                            </form>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
