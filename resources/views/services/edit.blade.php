@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear Servicio
        </div>
        <div class="card-body">
            <form action="/services/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $service->title }}" required>
                </div>
                <div class="form-group">
                    <label for="desc">Descripción: </label>
                    <textarea class="form-control" name="description" id="description">{{ $service->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="capacity">Capacidad: </label>
                    <input class="form-control" type="number" name="capacity" id="capacity" min="1" value="{{ $service->capacity }}" required>
                </div>
                <div class="form-group">
                    <label for="strip">Franja (expresada en minutos): </label>
                    <input class="form-control" type="number" name="strip" id="strip" min="1" value="{{ $service->strip }}" required>
                </div>
                <div class="form-group">
                    <label for="start">Hora de inicio: </label>
                    <input class="form-control" type="time" name="start" id="start"  value="{{ $service->start }}" required>
                </div>
                <div class="form-group">
                    <label for="start">Hora de cierre: </label>
                    <input class="form-control" type="time" name="final" id="final" value="{{ $service->final }}" required>
                </div>
                <div class="form-group">
                    <label for="state">Estado: </label>
                    <select class="form-control" name="state" id="state">
                        <option
                            @if($service->state == 1)
                                value ="enable"
                            @else
                                value="disable"
                            @endif
                            selected disabled
                        >
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

                <div class="form-group">
                    <label for="gallery">Galería de fotos</label>
                    <input class="form-control" type="file" name="gallery" id="gallery">
                </div>
                <p><h4>Días hábiles</h4></p>
                <div class="form-group">
                    @if($service->monday == 1)
                        <input type="checkbox" name="monday" id="monday" value="true" checked>
                    @else
                        <input type="checkbox" name="monday" id="monday" value="true">
                    @endif
                    <label for="monday">Lunes</label>
                </div>
                <div class="form-group">
                    @if($service->tuesday == 1)
                        <input type="checkbox" name="tuesday" id="tuesday" value="true" checked>
                    @else
                        <input type="checkbox" name="tuesday" id="tuesday" value="true">
                    @endif
                    <label for="tuesday">Martes</label>
                </div>
                <div class="form-group">
                    @if($service->wednesday == 1)
                        <input type="checkbox" name="wednesday" id="wednesday" value="true" checked>
                    @else
                        <input type="checkbox" name="wednesday" id="wednesday" value="true">
                    @endif
                    <label for="wednesday">Miércoles</label>
                </div>
                <div class="form-group">
                    @if($service->thursday == 1)
                        <input type="checkbox" name="thursday" id="thursday" value="true" checked>
                    @else
                        <input type="checkbox" name="thursday" id="thursday" value="true">
                    @endif
                    <label for="thursday">Jueves</label>
                </div>
                <div class="form-group">
                    @if($service->friday == 1)
                        <input type="checkbox" name="friday" id="friday" value="true" checked>
                    @else
                        <input type="checkbox" name="friday" id="friday" value="true">
                    @endif
                    <label for="friday">Viernes</label>
                </div>
                <div class="form-group">
                    @if($service->saturday == 1)
                        <input type="checkbox" name="saturday" id="saturday" value="true" checked>
                    @else
                        <input type="checkbox" name="saturday" id="saturday" value="true">
                    @endif
                    <label for="saturday">Sábado</label>
                </div>
                <div class="form-group">
                    @if($service->sunday == 1)
                        <input type="checkbox" name="sunday" id="sunday" value="true" checked>
                    @else
                        <input type="checkbox" name="sunday" id="sunday" value="true">
                    @endif
                    <label for="sunday">Domingo</label>
                </div>
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <input class="btn btn-secondary" style="width:100px; background-color:#B74438 !important; float:right"type="submit" value="Modificar">
            </form>
        </div>
    </div>
@endsection

