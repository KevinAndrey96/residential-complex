@extends('layouts.dashboard')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @if(Session::has('adminrecepSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('adminrecepSuccess') }}
        </div>
    @endif
</div>

<div class="card">
    <div class="card-header">
      Crear Adiministradores - Recepcionistas
    </div>
    <div class="card-body">
        <form action="/adminrecep/store" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Nombre: </label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono: </label>
                <input class="form-control" type="number" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="document">Número de documento: </label>
                <input class="form-control" type="text" name="document" id="document" required>
            </div>
            <div class="form-group">
                <label for="role">Rol: </label>
                <select class="form-control" name="role" id="role">
                    <option value="Administrator" selected>Administrador</option>
                    <option value="Receptionist">Recepcionista</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <input class="btn btn-danger" style="width:100px; background-color:#B74438 !important; float:right"type="submit" value="Agregar">
        </form>
    </div>
</div>
@endsection
