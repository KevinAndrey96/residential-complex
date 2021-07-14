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
      Editar Adiministradores - Recepcionistas
    </div>
    <div class="card-body">
        <form action="{{ url('/adminrecep/update') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Nombre: </label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $adminrecep->name }}">
            </div>
            <div class="form-group">
                <label for="phone">Teléfono: </label>
                <input class="form-control" type="number" name="phone" id="phone" value="{{ $adminrecep->phone }}">
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input class="form-control" type="email" name="email" id="email" value="{{ $adminrecep->email }}">
            </div>
            <div class="form-group">
                <label for="document_number">Número de documento: </label>
                <input class="form-control" type="text" name="document" id="document" value="{{ $adminrecep->document }}">
            </div>
            <div class="form-group">
                <label for="role">Rol: </label>
                <select class="form-control" name="role" id="role">
                    <option value="{{ $adminrecep->role  }}" selected disabled>
                        @if ($adminrecep->role == "Administrator")
                            Administrador
                        @else
                            Recepcionista
                        @endif
                    </option>
                    <option value="Administrator">Administrador</option>
                    <option value="Receptionist">Recepcionista</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <input type="hidden" name="id" value="{{ $id }}">
            <input class="btn btn-secondary" style="width:300px, background-color:#B74438 !important; float:right" type="submit" value="Modificar">
        </form>
    </div>
</div>
@endsection