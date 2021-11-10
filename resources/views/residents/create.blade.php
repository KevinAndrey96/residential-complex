@extends('layouts.dashboard')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('residentSuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('residentSuccess') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            Crear residente
        </div>
        <div class="card-body">
            <form action="/residents/store" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Nombre completo: </label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono: </label>
                        <input class="form-control" type="number" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico: </label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="tower">Torre: </label>
                        <input class="form-control" type="number" name="tower" id="tower" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="apt">Apartamento: </label>
                        <input class="form-control" type="number" name="apt" id="apt" min="1" required>
                    </div>
                    <input type="hidden" name="status" value="Habilitado">
                    <input type="hidden" name="role" value="Resident">
                <input class="btn btn-secondary" style="width:100px; background-color:#B74438 !important; float:right" type="submit" value="Agregar">
            </form>
        </div>
    </div>
@endsection
