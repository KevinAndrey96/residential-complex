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
            <h3 class="p-2">Editar celador</h3>
        </div>
        <div class="card-body">
            <form action="{{route('watchman.update')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="phone">N° Teléfono</label>
                        <input class="form-control" type="number" name="phone" id="phone" value="{{$user->phone}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="password">Contraseña</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <input type="hidden" name="userID" value="{{$user->id}}">
                    <div class="col-md-12 text-center ms-auto me-auto mt-4">
                        <input class="btn btn-success align-middle btn-round" type="submit" value="Modificar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
