@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Editar Servicio</h3>
        </div>
        <div class="card-body">
            <form action="/services/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">Nombre</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $service->title }}" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="capacity">Capacidad</label>
                        <input class="form-control" type="number" name="capacity" id="capacity" min="1" value="{{ $service->capacity }}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="strip">Tiempo (Min): </label>
                        <input class="form-control" type="number" name="strip" id="strip" min="1" value="{{ $service->strip }}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Hora de inicio</label>
                        <input class="form-control" type="time" name="start" id="start"  value="{{ $service->start }}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Hora de cierre: </label>
                        <input class="form-control" type="time" name="final" id="final" value="{{ $service->final }}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="state">Estado</label>
                        <select class="form-control" name="state" id="state">
                            <option
                                @if($service->state == 1)
                                    value ="enable"
                                @else
                                    value="disable"
                                @endif
                                selected>
                                @if($service->state == 1)
                                    Habilitado
                                @else
                                    Deshabilitado
                                @endif
                            </option>
                            <option value="enable">Habilitado</option>
                            <option value="disable">Deshabilitado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <h4 class="text-center ">Días hábiles</h4>
                        <div class="row">
                            <div class="form-group col-md-3">
                                @if($service->monday == 1)
                                    <input type="checkbox" name="monday" id="monday" value="true" checked>
                                @else
                                    <input type="checkbox" name="monday" id="monday" value="true">
                                @endif
                                <label for="monday">Lunes</label>
                            </div>
                            <div class="form-group col-md-3">
                                @if($service->tuesday == 1)
                                    <input type="checkbox" name="tuesday" id="tuesday" value="true" checked>
                                @else
                                    <input type="checkbox" name="tuesday" id="tuesday" value="true">
                                @endif
                                <label for="tuesday">Martes</label>
                            </div>
                            <div class="form-group col-md-3">
                                @if($service->wednesday == 1)
                                    <input type="checkbox" name="wednesday" id="wednesday" value="true" checked>
                                @else
                                    <input type="checkbox" name="wednesday" id="wednesday" value="true">
                                @endif
                                <label for="wednesday">Miércoles</label>
                            </div>
                            <div class="form-group col-md-3">
                                @if($service->thursday == 1)
                                    <input type="checkbox" name="thursday" id="thursday" value="true" checked>
                                @else
                                    <input type="checkbox" name="thursday" id="thursday" value="true">
                                @endif
                                <label for="thursday">Jueves</label>
                            </div>
                            <div class="form-group col-md-3">
                                @if($service->friday == 1)
                                    <input type="checkbox" name="friday" id="friday" value="true" checked>
                                @else
                                    <input type="checkbox" name="friday" id="friday" value="true">
                                @endif
                                <label for="friday">Viernes</label>
                            </div>
                            <div class="form-group col-md-3">
                                @if($service->saturday == 1)
                                    <input type="checkbox" name="saturday" id="saturday" value="true" checked>
                                @else
                                    <input type="checkbox" name="saturday" id="saturday" value="true">
                                @endif
                                <label for="saturday">Sábado</label>
                            </div>
                            <div class="form-group col-md-3">
                                @if($service->sunday == 1)
                                    <input type="checkbox" name="sunday" id="sunday" value="true" checked>
                                @else
                                    <input type="checkbox" name="sunday" id="sunday" value="true">
                                @endif
                                <label for="sunday">Domingo</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="desc">Descripción: </label>
                        <textarea class="form-control" name="description" id="description">{{ $service->description }}</textarea>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="gallery">Galería de fotos</label>
                        <input class="form-control" type="file" name="gallery[]" id="gallery" multiple>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input class="btn btn-success btn-round" style="width:100px;"type="submit" value="Modificar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

