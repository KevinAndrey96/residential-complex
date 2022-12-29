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
            <h3 class="p-2">Servicio</h3>
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
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Título</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Descripción</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Capacidad</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Franja</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Hora de inicio</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Hora de cierre</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Estado</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Días Hábiles</th>
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                                </tr>
                                <tbody>
                                    @foreach( $services as $service)
                                    <tr>
                                        <td style="text-align: center; padding:10px;">
                                            <a class="service" href="https://portal.portoamericas.com{{$service->gallery}}">
                                                <img class="" style="width: 150px; border-radius: 5%;"  onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" src="https://portal.portoamericas.com{{$service->gallery}}">
                                            </a></td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle"> {{ $service->title }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle"> {{ $service->description }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle"> {{ $service->capacity }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle"> {{ $service->strip }} minutos</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle"> {{ $service->start }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle"> {{ $service->final }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">
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
