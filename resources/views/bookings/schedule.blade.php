@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear Reservación
        </div>
        <div class="card-body">
            <form action="/bookings/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="quantity">Cantidad de personas: </label>
                    <input class="form-control" type="number" name="quantity" id="quantity" min="1" required>
                </div>
                <div class="form-group">
                    <label for="hour">Hora para iniciar el servicio de {{ $service->title }} (tenga en cuenta que el servicio dura {{ $service->strip }} minutos): </label>
                    <select class="form-control" name="hour" id="hour">
                        @foreach( $hours as $hour)
                        <option value="{{ $hour }}" selected>{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date"> Seleccione la fecha en la cual hará uso del servicio de {{ $service->title }}</label>
                    <input class="form-control" type="date" name="date" id="date" required>
                </div>
                <input type="hidden" name="state" id="state" value="Reservada">
                <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
                <input class="btn btn-secondary" style="width:100px; background-color:#B74438 !important; float:right"type="submit" value="Reservar">
            </form>
        </div>
    </div>
@endsection
