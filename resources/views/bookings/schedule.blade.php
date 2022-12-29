@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <p class="h4 text-center">Reservar {{ $service->title }}</p>
        </div>
        <div class="card-body">
            <form action="/bookings/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="quantity">N° Personas</label>
                        <input class="form-control" type="number" name="quantity" id="quantity" min="1" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date"> Seleccionar fecha</label>
                        <input class="form-control" type="date" name="date" id="date" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hour">Seleccionar Horario (Tiempo de servicio: {{ $service->strip }} minutos)</label>
                        <select class="form-control" name="hour" id="hour">
                            @foreach( $hours as $hour)
                            <option value="{{ $hour }}" selected>{{ $hour }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="hidden" name="state" id="state" value="Reservada">
                        <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
                        <input class="btn btn-primary align-middle btn-round" style="width:100px;" type="submit" value="Reservar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
