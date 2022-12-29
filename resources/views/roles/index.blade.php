@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Roles</h3>
        </div>
        <div class="card-body container-fluid">
            <div class="row justify-content-center" >
                <div class="col-auto mt-2">
                    <table style class=" table table-bordered table-responsive justify-content-center text-center" width="100%" id="datatable" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Rol</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Permisos</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role )
                            <tr>
                                <td style="padding:10px;" class="text-center text-md-center align-middle">{{$role->name}}</td>
                                <td style="padding:10px;" class="text-center text-md-center align-middle">fdgdfgd</td>
                                <td style="padding:10px;" class="text-center text-md-center align-middle">
                                    <div class="btn-group">
                                        <form method="POST" action="/rol/edit">
                                            @csrf
                                            <input type="hidden" name="id" value=>
                                            <button type="submit" data-toggle="tooltip" title="Editar"
                                                    value ="Editar" class="btn btn-link">
                                                <span style="color: green" class="material-symbols-outlined">edit</span>
                                            </button>
                                        </form>
                                        <form method="POST" action="/rol/delete">
                                            @csrf
                                            <input type="hidden" name="id" value=>
                                            <button type="submit" data-toggle="tooltip" title="Eliminar"
                                                    value="Eliminar" class="btn btn-link"
                                                    onclick="return confirm('¿Esta seguro que quiere borrar este usuario?');">
                                                <span style="color: red" class="material-symbols-outlined">delete</span>
                                            </button>
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
