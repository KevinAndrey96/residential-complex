@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Crear recepcionista</h3>
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
                        <label for="phone">Teléfono</label>
                        <input class="form-control" type="number" name="phone" id="phone" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="document">N° documento</label>
                        <input class="form-control" type="text" name="document" id="document" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="password">Contraseña</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="hidden" name="role" value="Receptionist">
                        <input class="btn btn-success btn-round" style="width:100px;"type="submit" value="Agregar">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
