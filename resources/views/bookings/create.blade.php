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
                        <h3 style="color:#ff0000;" class="text-center">
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
                        @for ($i = 0; $i < count($services); $i++)
                                <tr>
                                    <td class="text-center text-md-center align-middle">
                                        <div>
                                        @if ($services[$i]->state == 1)
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
                                            @if ($services[$i]->state == 1)
                                                <div class="btn-group">
                                                    <form method="POST" action="/bookings/schedule">
                                                        @csrf
                                                        <input type="hidden" name="service_id" value="{{ $services[$i]->id }}">
                                                        <input style="border-radius: 30px; width: 55px; text-align: center;" class="btn btn-success btn-block" type="submit" value ="Reservar">
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center text-md-center align-middle">
                                        <a class="service" href="#" data-toggle="modal" data-target="#serviceModal{{$services[$i]->id}}">
                                            <img class="" style="width: 150px; border-radius: 5%;"  onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" src="https://portal.portoamericas.com{{$superArray[$i][0]}}">
                                        </a>
                                    </td>
                                    <td class="text-center text-md-center align-middle"><p style="font-family: Roboto, sans-serif; font-size: 17px;
                                     font-weight:500;margin-bottom: -5px;">{{ $services[$i]->title }}</p>{{ $services[$i]->description }}</td>
                                    <td class="text-center text-md-center align-middle"><p style="margin-bottom: -5px; font-weight: 500;">{{ $services[$i]->capacity }}</p>personas</td>
                                    <td class="text-center text-md-center align-middle"><p style="margin-bottom: -5px; margin-top: 15px;font-weight: 500;">{{ $services[$i]->start }}</p>a<p style="margin-top: -5px; font-weight: 500;">{{ $services[$i]->final }}</p></td>
                                    <td class="text-center text-md-center align-middle"><p style="margin-bottom: -5px; font-weight: 500;">{{ $services[$i]->strip }}</p> minutos</td>
                                    <td class="text-center text-md-center align-middle">
                                        <ul>
                                            @if ($services[$i]->monday == 1) <li> Lunes </li> @endif
                                            @if ($services[$i]->tuesday == 1) <li> Martes </li> @endif
                                            @if ($services[$i]->wednesday == 1) <li> Miércoles </li> @endif
                                            @if ($services[$i]->thursday == 1) <li> Jueves </li> @endif
                                            @if ($services[$i]->friday == 1) <li> Viernes </li> @endif
                                            @if ($services[$i]->saturday == 1) <li> Sábado </li> @endif
                                            @if ($services[$i]->sunday == 1) <li> Domingo </li> @endif
                                        </ul>
                                    </td>

                                </tr>
                                <!-- Modal-->
                                <div class="modal fade" id="serviceModal{{$services[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body" style="padding:0px;">
                                                <div id="carouselServiceControls{{$services[$i]->id}}" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner" style="width:100%; border:none;">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100 rounded img-fluid" src="https://portal.portoamericas.com{{$superArray[$i][0]}}">
                                                        </div>
                                                        @for ($j = 1; $j < count($superArray[$i])-1; $j++)
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100 rounded img-fluid" src="https://portal.portoamericas.com{{$superArray[$i][$j]}}">
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselServiceControls{{$services[$i]->id}}" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselServiceControls{{$services[$i]->id}}" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end Modal-->
                        @endfor
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
