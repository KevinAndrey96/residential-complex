@extends('layouts.dashboard')
@section('content')
        @if(Session::has('bookingSuccess'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-success" role="alert">
                    {{ Session::get('bookingSuccess') }}
                </div>
            </div>
        @endif
        @if(Session::has('dayFail'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('dayFail') }}
                </div>
            </div>
        @endif
        @if(Session::has('dateFail'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('dateFail') }}
                </div>
            </div>
        @endif
        @if(Session::has('quantityFail'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('quantityFail') }}
                </div>
            </div>
        @endif
        @if(Session::has('personsFail'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('personsFail') }}
                </div>
            </div>
        @endif

        @if(Session::has('limitPerDayFail'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('limitPerDayFail') }}
                </div>
            </div>
        @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Servicios de clubhouse</h3>
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                @if(Auth::user()->resident->status == 'Deshabilitado')
                    <div class="col-auto mt-2">
                        <h3 style="color:#ff0000">
                            Estimado residente usted no puede hacer uso de los servicios de clubhouse
                        </h3>
                    </div>
                @else
                    <div class="col-auto">
                    <table class="table table-responsive datatable" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center" style="padding: 10px;">Estado
                            <th class="text-center" ></th>
                            <th class="text-center" style="padding: 10px;">Servicio</th>
                            <th class="text-center" style="padding: 10px 30px">Capacidad</th>
                            <th class="text-center" style="padding: 10px 30px">Horarios</th>
                            <th class="text-center" style="padding: 10px 30px">Tiempo</th>
                            <th class="text-center" style="padding: 10px 30px">Días hábiles</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service )
                                <tr>
                                    <td class="text-center text-md-center align-middle">
                                        <div>
                                        @if ($service->state == 1)
                                            <span style="color: green;" class="material-symbols-outlined">
                                            thumb_up_off
                                            </span><p>Habilitado</p>
                                        @else
                                            <span style="color: red;" class="material-symbols-outlined">
                                            thumb_down_off
                                            </span><p>Deshabilitado</p>
                                        @endif
                                        </div>
                                        <div>
                                            @if ($service->state == 1)
                                                <div class="btn-group">
                                                    <form method="POST" action="/bookings/schedule">
                                                        @csrf
                                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                        <input style="border-radius: 30px; width: 55px; text-align: center;" class="btn btn-success btn-block" type="submit" value ="Reservar">
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center text-md-center align-middle">
                                        <a class="service " href="http://portal.portoamericas.com/storage/{{substr($service->gallery, 7)}}">
                                            <img width="150px" height="auto" class="text-center text-md-center align-middle" style=" border-radius: 5%;"
                                                 onError="this.onerror=null;this.src='/assets/images/logo.png';"
                                                 src="http://portal.portoamericas.com/storage/{{substr($service->gallery, 7)}}">
                                        </a>
                                    </td>
                                    <td class="text-center text-md-center align-middle"><p style="font-family: Roboto, sans-serif; font-size: 17px;
                                     font-weight:500;margin-bottom: -5px;">{{ $service->title }}</p>{{ $service->description }}</td>
                                    <td class="text-center text-md-center align-middle"><p style="margin-bottom: -5px; font-weight: 500;">{{ $service->capacity }}</p>personas</td>
                                    <td class="text-center text-md-center align-middle"><p style="margin-bottom: -5px; margin-top: 15px;font-weight: 500;">{{ $service->start }}</p>a<p style="margin-top: -5px; font-weight: 500;">{{ $service->final }}</p></td>
                                    <td class="text-center text-md-center align-middle"><p style="margin-bottom: -5px; font-weight: 500;">{{ $service->strip }}</p> minutos</td>
                                    <td class="text-center text-md-center align-middle">
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
