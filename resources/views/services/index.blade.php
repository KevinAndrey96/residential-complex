@extends('layouts.dashboard')
@section('content')
    @if(Session::has('updaservsuccess'))
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="alert alert-success" role="alert">
                {{ Session::get('updaservsuccess') }}
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Servicios</h3>
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div class="col-auto mt-2">
                    <div>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; padding:10px;">Imagen</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Servicio</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Capacidad</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Franja</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Horario</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Estado</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Días Hábiles</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                                </tr>
                                <tbody>
                                    @for ($i = 0; $i < count($services); $i++)
                                    <tr>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
                                            <a class="service" href="#" data-toggle="modal" data-target="#serviceModal{{$services[$i]->id}}">
                                                <img class="" style="width: 150px; border-radius: 5%;"  onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" src="https://portal.reservadetoscana.com{{$superArray[$i][0]}}">
                                            </a></td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
                                            <p style="margin-bottom: -5px; font-weight: bold;">{{ $services[$i]->title }}</p>
                                            <p>{{ $services[$i]->description }}</p>
                                        </td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $services[$i]->capacity }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
                                            <p style="margin-bottom: -5px;">{{ $services[$i]->strip }}</p>minutos
                                        </td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
                                            <p style="margin-bottom: -5px; margin-top: 15px;">
                                                {{ $services[$i]->start }}</p> a <p>{{ $services[$i]->final }}
                                            </p>
                                        </td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
                                            @if ( $services[$i]->state )
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
                                            <ul>
                                                @if ( $services[$i]->monday == 1 ) <li> Lunes </li> @endif
                                                @if ( $services[$i]->tuesday == 1 ) <li> Martes </li> @endif
                                                    @if ( $services[$i]->wednesday == 1 ) <li> Miércoles </li> @endif
                                                    @if ( $services[$i]->thursday == 1 ) <li> Jueves </li> @endif
                                                    @if ( $services[$i]->friday == 1 ) <li> Viernes </li> @endif
                                                    @if ( $services[$i]->saturday == 1 ) <li> Sábado </li> @endif
                                                    @if ( $services[$i]->sunday == 1 ) <li> Domingo </li> @endif
                                            </ul>
                                        </td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
                                            <div class="d-flex">
                                                <div class="d-inline">
                                                    <form method="POST" action="/services/edit">
                                                        @csrf
                                                        <input type="hidden" name="id" value={{ $services[$i]->id }}>
                                                        <button type="submit" data-toggle="tooltip" title="Editar"
                                                                value="Editar" class="btn btn-link">
                                                            <span style="color: green" class="material-symbols-outlined">edit</span>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="d-inline">
                                                    <form method="POST" action="/services/delete">
                                                        @csrf
                                                        <input type="hidden" name="id" value={{ $services[$i]->id }}>
                                                        <button type="submit" data-toggle="tooltip" title="Eliminar"
                                                                value="Eliminar" class="btn btn-link"
                                                                onclick="return confirm('Esta seguro que quiere borrar el servicio?');">
                                                            <span style="color: red" class="material-symbols-outlined">delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
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
                                                                <img class="d-block w-100 rounded img-fluid" src="https://portal.reservadetoscana.com{{$superArray[$i][0]}}">
                                                            </div>
                                                            @for ($j = 1; $j < count($superArray[$i])-1; $j++)
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100 rounded img-fluid" src="https://portal.reservadetoscana.com{{$superArray[$i][$j]}}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
