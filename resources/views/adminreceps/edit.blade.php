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
        @hasrole('Superadmin')
        <h3 class="p-2">Editar Adiministradores - Recepcionistas</h3>
        @endrole
        @hasrole('Administrator')
        <h3 class="p-2">Editar recepcionista</h3>
        @endrole
    </div>
    <div class="card-body">
        <form action="{{ url('/adminrecep/update') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="name">Nombre</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="phone">Teléfono</label>
                    <input class="form-control" type="number" name="phone" id="phone" value="{{ $user->phone }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="document_number">N documento</label>
                    <input class="form-control" type="text" name="document" id="document" value="{{ $user->adminrecep->document }}">
                </div>
                @hasrole('Superadmin')
                <div class="form-group col-md-2">
                    <label for="role">Rol</label>
                    <select class="form-control" name="role" id="role">
                        <option value="{{ $user->role  }}" selected>
                            @if ($user->role == "Administrator")
                                Administrador
                            @else
                                Recepcionista
                            @endif
                        </option>
                        <option value="Administrator">Administrador</option>
                        <option value="Receptionist">Recepcionista</option>
                    </select>
                </div>
                @endrole
                <div class="form-group col-md-3">
                    <label for="password">Contraseña: </label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="col-md-2 text-center mt-4">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input class="btn btn-primary align-middle btn-round" style="width:100px;" type="submit" value="Modificar">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
