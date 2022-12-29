@extends('layouts.dashboard')
@section('content')
    @if(Session::has('residentSuccess'))
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="alert alert-success" role="alert">
                {{ Session::get('residentSuccess') }}
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Crear residente</h3>
        </div>
        <div class="card-body">
            <form action="/residents/store" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">Nombre completo</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="phone">Teléfono</label>
                        <input class="form-control" type="number" name="phone" id="phone" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Correo electrónico</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tower">Torre</label>
                        <input class="form-control" type="number" name="tower" id="tower" min="1" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="apt">Apartamento</label>
                        <input class="form-control" type="number" name="apt" id="apt" min="1" required>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="hidden" name="status" value="Habilitado">
                        <input type="hidden" name="role" value="Resident">
                        <input class="btn btn-primary btn-round" style="width:100px;" type="submit" value="Agregar">
                    </div>
               </div>
            </form>
        </div>
    </div>
@endsection
