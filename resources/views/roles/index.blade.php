@extends('layouts.dashboard')
@section('content')


    <div class="card">
        <div class="card-header">
            Roles
        </div>
        <div class="card-body container-fluid">
            <div class="row justify-content-center" >
                <div class="col-auto mt-5">
                    <table style class=" table table-bordered table-responsive justify-content-center text-center" width="100%" id="datatable" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Rol</th>
                            <th style="text-align: center; padding:10px;">Permisos</th>
                            <th style="text-align: center; padding:10px;">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role )
                            <tr>
                                <td style="text-align: center; padding:10px">{{$role->name}}</td>
                                <td style="text-align: center; padding:10px">fdgdfgd</td>



                                <td style="text-align: center; padding:10px;">
                                    <div class="btn-group">
                                        <form method="POST" action="/rol/edit">
                                            @csrf
                                            <input type="hidden" name="id" value=>
                                            <input style="margin:3px; width:50%;" class="btn btn-warning btn-block" type="submit" value ="Editar">
                                        </form>
                                        <form method="POST" action="/rol/delete">
                                            @csrf
                                            <input type="hidden" name="id" value=>
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
