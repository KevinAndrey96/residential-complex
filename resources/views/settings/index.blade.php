@extends('layouts.dashboard')
@section('content')



<div class="card">
    <div class="card-header">
        Configuraciones
    </div>
    <div class="card-body container-fluid">
        <div class="row justify-content-center" >
            <div class="col-auto mt-5">
                <table class="table table-bordered table-responsive" id="datatable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Nombre</th>
                            <th style="text-align: center; padding:10px;">Número de torres</th>
                            <th style="text-align: center; padding:10px;">Número de interiores</th>
                            <th style="text-align: center; padding:10px;">Número de apartamentos</th>
                            <th style="text-align: center; padding:10px;">Glosario</th>
                            <th style="text-align: center; padding:10px;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting)
                        <tr>
                            <td style="text-align: center; padding:10px;">{{ $setting->name }}</td>
                            <td style="text-align: center; padding:10px;">{{ $setting->num_tower }}</td>
                            <td style="text-align: center; padding:10px;">{{ $setting->num_int }}</td>
                            <td style="text-align: center; padding:10px;">{{ $setting->num_apt }}</td>
                            <td style="text-align: center; padding:10px;">{{ $setting->glossary }}</td>
                            <td style="text-align: center; padding:10px;">
                                <div class="btn-group">
                                    <form method="POST" action="/setting/edit">
                                        @csrf
                                        <input type="hidden" name="id" value={{ $setting->id }}>
                                        <input style="margin:3px; width:50%;" class="btn btn-warning btn-block" type="submit" value ="Editar">
                                    </form>
                                    <form method="POST" action="/setting/delete">
                                        @csrf
                                        <input type="hidden" name="id" value={{ $setting->id }}>
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

