@extends('layouts.dashboard')
@section('content')
    @if(Session::has('adminrecepSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('adminrecepSuccess') }}
        </div>
    @endif
    @if (Session::has('adminrecepAlreadyExist'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('adminrecepAlreadyExist') }}
        </div>
    @endif
    @if(Session::has('successSave'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successSave') }}
        </div>
    @endif
    @if (Session::has('failedSave'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failedSave') }}
        </div>
    @endif
    @if(Session::has('successUpdate'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successUpdate') }}
        </div>
    @endif
    @if (Session::has('failedUpdate'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failedUpdate') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            Guardias de Seguridad
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
                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                        <tr>
                                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->id}}</td>
                                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->name}}</td>
                                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->phone}}</td>
                                            <td style="padding:10px;" class="text-center text-md-center align-middle">{{$user->email}}</td>
                                            <td style="padding:10px;" class="text-center text-md-center align-middle">
                                                <div>
                                                    <a style="color:green;" href="{{route('watchman.edit', ['id' => $user->id])}}">
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
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

