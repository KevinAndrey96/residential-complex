@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header text-center">
        @hasrole('Superadmin')
        <h3 class="p-2">Administradores - Recepcionistas</h3>
        @endrole
        @hasrole('Administrator')
        <h3 class="p-2">Recepcionistas</h3>
        @endrole
    </div>
    <div class="card-body container-fluid">
        <div class="justify-content-center" >
            <div class="col-auto mt-2">
              <div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th style="padding:10px;" class="">Id</th>
                                <th style="padding:10px;" class="text-center text-md-center align-middle">Nombre</th>
                                <th style="padding:10px;" class="text-center text-md-center align-middle">Telefono</th>
                                <th style="padding:10px;" class="text-center text-md-center align-middle">Email</th>
                                <th style="padding:10px;" class="text-center text-md-center align-middle">Documento</th>
                                @hasrole('Superadmin')
                                <th style="padding:10px;" class="text-center text-md-center align-middle">Rol</th>
                                @endrole
                                <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        @hasrole('Superadmin')
                        @foreach($users as $user)
                            @if($user->adminrecep->document && $user->role)
                                    <tr>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->id}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->name}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->phone}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->email}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->adminrecep->document}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">
                                    @if ($user->role == 'Administrator')
                                        Administrador
                                    @else
                                        Recepcionista
                                    @endif
                                    </td>
                                    <td class="text-center text-md-center align-middle">
                                        <div class="">
                                            <a style="color:green;" href="/adminrecep/edit/{{$user->id}}">
                                                <span title="Editar" class="material-symbols-outlined text-center">drive_file_rename_outline</span></a>
                                            <form method="POST" action="/adminrecep/delete">
                                                @csrf
                                                <input type="hidden" name="id" value={{ $user->id }}>
                                                <button style="border-radius: 50px;" type="submit" value="Eliminar" class="btn btn-link"
                                                        onclick="return confirm('¿Esta seguro que quiere borrar este usuario?');">
                                                    <span style="color: red" class="material-symbols-outlined" title="Eliminar" >delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endrole
                        @hasrole('Administrator')
                        @foreach($users as $user)
                            @if($user->adminrecep->document && $user->role && $user->role == 'Receptionist')
                                <tr>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->id}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->name}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->phone}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->email}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->adminrecep->document}}</td>
                                    <td style="padding:10px;" class="text-center text-md-center align-middle">
                                        <div>
                                            <a style="color:green;" href="/adminrecep/edit/{{$user->id}}">
                                                <span title="Editar" class="material-symbols-outlined text-center">drive_file_rename_outline</span>
                                            </a>
                                            <form method="POST" action="/adminrecep/delete">
                                                @csrf
                                                <input type="hidden" name="id" value={{ $user->id }}>
                                                <button style="border-radius: 50px;" type="submit" value="Eliminar" class="btn btn-link"
                                                        onclick="return confirm('¿Esta seguro que quiere borrar este usuario?');">
                                                    <span style="color: red" class="material-symbols-outlined" title="Eliminar"  >delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>

                            @endif
                        @endforeach
                        @endrole

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
