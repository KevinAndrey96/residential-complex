@extends('layouts.dashboard')
@section('content')
        @if(Session::has('usedApt'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('usedApt') }}
            </div>
        @endif
        @if (Session::has('formNotFilled'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('formNotFilled') }}
            </div>
        @endif
        @if(Session::has('updaresisuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('updaresisuccess') }}
            </div>
        @endif
        @if(Session::has('residentSuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('residentSuccess') }}
            </div>
        @endif
        @if(Session::has('residentFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('residentFail') }}
            </div>
        @endif

    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Residentes</h3>
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div class="col-auto mt-2">
                <div>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap"
                               width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Id</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Nombre</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Telefono</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Email</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Torre</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Apartamento</th>
                            <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($user->role == 'Resident')
                                    <tr>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $user->id }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $user->name }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $user->phone }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">{{ $user->email }}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">{{ (isset($user->resident->tower)) ? $user->resident->tower : ''}}</td>
                                        <td style="padding:10px;" class="text-center text-md-center align-middle">{{ (isset($user->resident->apt)) ? $user->resident->apt  : ''}}</td>
                                        <td style="text-align: center;">

                                            <div id="endis">
                                                @if(isset($user->resident->status))
                                                    @if($user->resident->status == 'Habilitado')
                                                        <input type="checkbox" data-onstyle="success"
                                                               checked
                                                               data-on="Habilitado"
                                                               data-size="xs"
                                                               data-toggle="toggle"
                                                               name="togglestatus{{$user->id}}" id="togglestatus{{$user->id}}"
                                                               onchange="getStatus({{$user->id}})">
                                                    @elseif($user->resident->status == 'Deshabilitado')
                                                        <input type="checkbox" data-onstyle="success"
                                                               data-off="Deshabilitado"
                                                               data-size="xs"
                                                               data-toggle="toggle"
                                                               name="togglestatus{{$user->id}}" id="togglestatus{{$user->id}}"
                                                               onchange="getStatus({{$user->id}})">
                                                    @endif
                                                    @else
                                                    <input type="checkbox" data-onstyle="success"
                                                           checked
                                                           data-on="Habilitado"
                                                           data-size="xs"
                                                           data-toggle="toggle"
                                                           name="togglestatus{{$user->id}}" id="togglestatus{{$user->id}}"
                                                           onchange="getStatus({{$user->id}})">
                                                @endif
                                            </div>
                                            <div class="row justify-content-center">
                                                <a style="color:darkblue;" data-toggle="tooltip" title="Información extra" href="/extrainfo/index/{{$user->id}}">
                                                    <span title="Editar" class="material-symbols-outlined text-center mt-3 ml-3">quick_reference</span>
                                                </a>
                                                <a style="color:green;" data-toggle="tooltip" title="Editar" alt="Editar" href="/residents/edit/{{$user->id}}">
                                                    <span title="Editar" class="material-symbols-outlined text-center mt-3 ml-3">edit</span>
                                                </a>
                                                <form class="mt-1" method="POST" action="/residents/delete">
                                                    @csrf
                                                    <input type="hidden" name="id" value={{ $user->id }}>
                                                    <button type="submit" data-toggle="tooltip" title="Eliminar"
                                                            value="Eliminar" class="btn btn-link"
                                                            onclick="return confirm('Si borra el residente el apartamento de este se reseteara y no tendrá dueño, esta seguro?');">
                                                        <span style="color: red" class="material-symbols-outlined">delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                        <form id="form-status" name="form-status" method="post" action="/changeStatusResident">
                        @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="status" id="status">
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getStatus(id)
        {
            var toggle = document.getElementById("togglestatus"+id);
            var status = document.getElementById("status");
            var form = document.getElementById("form-status");
            var user_id = document.getElementById("id");

            if(toggle.checked == true){
                status.value = 'Habilitado';
            } else {
                status.value = 'Deshabilitado';
            }
            user_id.value = id;
            form.submit();
        }
    </script>
@endsection
