@extends('layouts.dashboard')
@section('content')



<div class="card">
    <div class="card-header">
       Administradores - Recepcionistas
    </div>
    <div class="card-body container-fluid">
        <div class="row justify-content-center" >
            <div class="col-auto mt-5">
                <table class="table table-bordered table-responsive datatable" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Id</th>
                            <th style="text-align: center; padding:10px;">Nombre</th>
                            <th style="text-align: center; padding:10px;">Telefono</th>
                            <th style="text-align: center; padding:10px;">Email</th>
                            <th style="text-align: center; padding:10px;">Documento</th>
                            <th style="text-align: center; padding:10px;">Rol</th>
                            <th style="text-align: center; padding:10px;">Acción</th>

                        </tr>
                    </thead>
                    <tbody class="justify-content-center text-center">
                        @foreach($adminreceps as $adminrecep)
                            <tr>
                                <td style="text-align: center; padding:10px;">{{$adminrecep->id}}</td>
                                <td style="text-align: center; padding:10px;">{{$adminrecep->name}}</td>
                                <td style="text-align: center; padding:10px;">{{$adminrecep->phone}}</td>
                                <td style="text-align: center; padding:10px;">{{$adminrecep->email}}</td>
                                <td style="text-align: center; padding:10px;">{{$adminrecep->document}}</td>
                                <td style="text-align: center; padding:10px;">
                                @if ($adminrecep->role == 'Administrator')
                                    Administrador
                                @else
                                    Recepcionista
                                @endif
                                </td>
                                <td style="text-align: center; padding:10px;">
                                    <div class="btn-group">
                                        <form method="POST" action="/adminrecep/edit">
                                            @csrf
                                            <input type="hidden" name="id" value={{ $adminrecep->id }}>
                                            <input style="margin:3px; width:50%;" class="btn btn-warning btn-block" type="submit" value ="Editar">
                                        </form>
                                        <form method="POST" action="/adminrecep/delete">
                                            @csrf
                                            <input type="hidden" name="id" value={{ $adminrecep->id }}>
                                            <input style="margin:3px; width:50%;" class="btn btn-danger btn-block" type="submit" onclick="return confirm('¿Esta seguro que quiere borrar este usuario?');" value ="Eliminar">
                                        </form>
                                    </div>
                                </td>

                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
