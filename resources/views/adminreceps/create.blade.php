@extends('layouts.dashboard')
@section('content')
    @if(Session::has('adminrecepSuccess'))
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="alert alert-success" role="alert">
                {{ Session::get('adminrecepSuccess') }}
            </div>
        </div>
    @endif
<div class="card">
    <div class="card-header text-center">
        <h3 class="p-2">Administradores - Recepcionistas</h3>
    </div>
    <div class="card-body">
        <form action="/adminrecep/store" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
          <div class="row">
            <div class="form-group col-md-3">
                <label for="name">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="form-group col-md-2">
                <label for="phone">N° Teléfono</label>
                <input class="form-control" type="number" name="phone" id="phone" required>
            </div>
            <div class="form-group col-md-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            <div class="form-group col-md-2">
                <label for="document">N° documento: </label>
                <input class="form-control" type="text" name="document" id="document" required>
            </div>
            <div class="form-group col-md-2">
                <label for="role">Rol</label>
                <select class="form-control" name="role" id="role">
                    <option value="Administrator" selected>Administrador</option>
                    <option value="Receptionist">Recepcionista</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="col-md-2 text-center mt-4">
                <input class="btn btn-primary align-middle btn-round" type="submit" value="Agregar">
            </div>
          </div>
        </form>
    </div>
</div>
@endsection
