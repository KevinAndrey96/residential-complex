@extends('layouts.dashboard')
@section('content')
    @if(Session::has('changePasswordSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('changePasswordSuccess') }}
        </div>
    @endif
    @if(Session::has('changePasswordFail'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('changePasswordFail') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Cambiar contraseña</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/changePassword">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="oldPassword">Escriba su antigua contraseña:</label>
                        <input type="password" class="form-control" name="oldPassword" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="newPassword">Escriba su nueva contraseña:</label>
                        <input type="password" class="form-control" name="newPassword" required>
                    </div>
                    <div class="col-md-4 text-center mt-4">
                        <input type="submit" class="btn btn-success btn-round align-middle" value="Cambiar contraseña">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
