@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear Servicio
        </div>
        <div class="card-body">
            <form action="/services/store" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input class="form-control" type="text" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="desc">Descripción: </label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="capacity">Capacidad: </label>
                    <input class="form-control" type="number" name="capacity" id="capacity" min="1" required>
                </div>
                <div class="form-group">
                    <label for="strip">Franja (expresada en minutos): </label>
                    <input class="form-control" type="number" name="strip" id="strip" min="1" required>
                </div>
                <div class="form-group">
                    <label for="start">Hora de inicio: </label>
                    <input class="form-control" type="time" name="start" id="start" required>
                </div>
                <div class="form-group">
                    <label for="start">Hora de cierre: </label>
                    <input class="form-control" type="time" name="final" id="final" required>
                </div>
                <div class="form-group">
                    <label for="state">Estado: </label>
                    <select class="form-control" name="state" id="state">
                        <option value="enable">Habilitado</option>
                        <option value="disable">Deshabilitado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gallery">Galería de fotos</label>
                    <input class="form-control" type="file" name="gallery" id="gallery" required>
                </div>
                <p><h4>Días hábiles</h4></p>
                <div class="form-group">
                    <input type="checkbox" name="monday" id="monday" value="true">
                    <label for="monday">Lunes</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="tuesday" id="tuesday" value="true">
                    <label for="tuesday">Martes</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="wednesday" id="wednesday" value="true">
                    <label for="wednesday">Miércoles</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="thursday" id="thursday" value="true">
                    <label for="thursday">Jueves</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="friday" id="friday" value="true">
                    <label for="friday">Viernes</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="saturday" id="saturday" value="true">
                    <label for="saturday">Sábado</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="sunday" id="sunday" value="true">
                    <label for="sunday">Domingo</label>
                </div>

                <input type="hidden" name="status" value="Habilitado">
                <input type="hidden" name="role" value="Resident">
                <input class="btn btn-secondary" style="width:100px; background-color:#B74438 !important; float:right"type="submit" value="Agregar">
            </form>
        </div>
    </div>
@endsection
