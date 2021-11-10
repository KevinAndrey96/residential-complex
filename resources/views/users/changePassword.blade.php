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
        <div class="card-header">
            Cambiar contraseña
        </div>
        <div class="card-body">
            <form method="POST" action="/changePassword">
                @csrf
                <div class="form-group">
                    <label for="oldPassword">Escriba su antigua contraseña:</label>
                    <input type="password" class="form-control" name="oldPassword" required>
                </div>
                <div class="form-group">
                    <label for="newPassword">Escriba su nueva contraseña:</label>
                    <input type="password" class="form-control" name="newPassword" required>
                </div>
                <input style="float:right" type="submit" class="btn btn-danger" value="Cambiar contraseña">
            </form>

        </div>
    </div>
@endsection
