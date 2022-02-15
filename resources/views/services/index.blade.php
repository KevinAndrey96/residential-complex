@extends('layouts.dashboard')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('updaservsuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('updaservsuccess') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            Servicios
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; padding:10px;">Imagen</th>
                                    <th style="text-align: center; padding:10px;">Título</th>
                                    <th style="text-align: center; padding:10px;">Descripción</th>
                                    <th style="text-align: center; padding:10px;">Capacidad</th>
                                    <th style="text-align: center; padding:10px;">Franja</th>
                                    <th style="text-align: center; padding:10px;">Hora de inicio</th>
                                    <th style="text-align: center; padding:10px;">Hora de cierre</th>
                                    <th style="text-align: center; padding:10px;">Estado</th>
                                    <th style="text-align: center; padding:10px;">Días Hábiles</th>
                                    <th style="text-align: center; padding:10px;">Acción</th>
                                </tr>
                                <tbody>
                                    @foreach( $services as $service)
                                    <tr>
                                        <td style="text-align: center; padding:10px;">
                                            <a class="service" href="https://portal.portoamericas.com{{$service->gallery}}">
                                                <img class="" style="width: 150px; border-radius: 5%;"  onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" src="https://portal.portoamericas.com{{$service->gallery}}">
                                            </a></td>
                                        <td style="text-align: center; padding:10px;"> {{ $service->title }}</td>
                                        <td style="text-align: center; padding:10px;"> {{ $service->description }}</td>
                                        <td style="text-align: center; padding:10px;"> {{ $service->capacity }}</td>
                                        <td style="text-align: center; padding:10px;"> {{ $service->strip }} minutos</td>
                                        <td style="text-align: center; padding:10px;"> {{ $service->start }}</td>
                                        <td style="text-align: center; padding:10px;"> {{ $service->final }}</td>
                                        <td style="text-align: center; padding:10px;">
                                            @if($service->state)
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>
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
                                            <div class="btn-group">
                                                <form method="POST" action="/services/edit">
                                                    @csrf
                                                    <input type="hidden" name="id" value={{ $service->id }}>
                                                    <input style="margin:3px; width:50%;" class="btn btn-warning btn-block" type="submit" value ="Editar">
                                                </form>
                                                <form method="POST" action="/services/delete">
                                                    @csrf
                                                    <input type="hidden" name="id" value={{ $service->id }}>
                                                    <input style="margin:3px; width:50%;" class="btn btn-danger btn-block" type="submit" onclick="return confirm('Esta seguro que quiere borrar el servicio?');" value ="Eliminar">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
