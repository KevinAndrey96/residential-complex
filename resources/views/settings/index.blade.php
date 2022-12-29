@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h3 class="p-2">Configuraciones</h3>
    </div>
    <div class="card-body container-fluid">
        <div class="row justify-content-center" >
            <div class="col-auto mt-5">
                <table class="table table-bordered table-responsive display responsive no-wrap" id="datatable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Nombre</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Número de torres</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Número de interiores</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Número de apartamentos</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Glosario</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting)
                        <tr>
                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $setting->name }}</td>
                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $setting->num_tower }}</td>
                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $setting->num_int }}</td>
                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $setting->num_apt }}</td>
                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $setting->glossary }}</td>
                            <td style="padding:10px;" class="text-center text-md-center align-middle">
                                <div class="btn-group">
                                    <form method="POST" action="/setting/edit">
                                        @csrf
                                        <input type="hidden" name="id" value={{ $setting->id }}>
                                        <button type="submit" data-toggle="tooltip" title="Editar"
                                                value="Editar" class="btn btn-link">
                                            <span style="color: green" class="material-symbols-outlined">edit</span>
                                        </button>
                                    </form>
                                    <form method="POST" action="/setting/delete">
                                        @csrf
                                        <input type="hidden" name="id" value={{ $setting->id }}>
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

