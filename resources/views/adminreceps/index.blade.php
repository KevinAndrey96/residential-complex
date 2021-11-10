@extends('layouts.dashboard')
@section('content')



<div class="card">
    <div class="card-header">
        @hasrole('Superadmin')
        Administradores - Recepcionistas
        @endrole
        @hasrole('Administrator')
        Recepcionistas
        @endrole
    </div>
    <div class="card-body container-fluid">
        <div class="justify-content-center" >
            <div style="width: 100%; padding-left: -10px;">
            <div class="col-auto mt-5">
                <div class="table-responsive">
                <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Id</th>
                            <th style="text-align: center; padding:10px;">Nombre</th>
                            <th style="text-align: center; padding:10px;">Telefono</th>
                            <th style="text-align: center; padding:10px;">Email</th>
                            <th style="text-align: center; padding:10px;">Documento</th>
                            @hasrole('Superadmin')
                            <th style="text-align: center; padding:10px;">Rol</th>
                            @endrole
                            <th style="text-align: center; padding:10px;">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="justify-content-center text-center">
                    @hasrole('Superadmin')
                    @foreach($users as $user)
                        @if($user->adminrecep->document && $user->role)
                                <tr>
                                <td style="text-align: center; padding:10px;">{{$user->id}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->name}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->phone}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->email}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->adminrecep->document}}</td>
                                <td style="text-align: center; padding:10px;">
                                @if ($user->role == 'Administrator')
                                    Administrador
                                @else
                                    Recepcionista
                                @endif
                                </td>
                                <td style="text-align: center; padding:10px;">
                                    <div class="btn-group">
                                        <a style="margin:3px; width:50%; color:white;" class="btn btn-warning btn-block" href="/adminrecep/edit/{{$user->id}}">Editar</a>
                                        <form method="POST" action="/adminrecep/delete">
                                            @csrf
                                            <input type="hidden" name="id" value={{ $user->id }}>
                                            <input style="margin:3px; width:50%;" class="btn btn-danger btn-block" type="submit" onclick="return confirm('¿Esta seguro que quiere borrar este usuario?');" value ="Eliminar">
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
                                <td style="text-align: center; padding:10px;">{{$user->id}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->name}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->phone}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->email}}</td>
                                <td style="text-align: center; padding:10px;">{{$user->adminrecep->document}}</td>
                                <td style="text-align: center; padding:10px;">
                                    <div class="btn-group">
                                        <a style="margin:3px; width:50%; color:white;" class="btn btn-warning btn-block" href="/adminrecep/edit/{{$user->id}}">Editar</a>
                                        <form method="POST" action="/adminrecep/delete">
                                            @csrf
                                            <input type="hidden" name="id" value={{ $user->id }}>
                                            <input style="margin:3px; width:50%;" class="btn btn-danger btn-block" type="submit" onclick="return confirm('¿Esta seguro que quiere borrar este usuario?');" value ="Eliminar">
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
