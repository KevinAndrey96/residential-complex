@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Residentes
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
                            <th style="text-align: center; padding:10px;">Torre</th>
                            <th style="text-align: center; padding:10px;">Apartamento</th>
                            <th style="text-align: center; padding:10px;">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($user->role == 'Resident')
                                    <tr>
                                        <td style="text-align: center; padding:10px;">{{ $user->id }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->name }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->phone }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->email }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->resident->tower }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->resident->apt }}</td>
                                        <td style="text-align: center; padding:10px;" class="">
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
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <form id="form-status" name="form-status" method="post" action="/changeStatusResident">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="status" id="status">
                    </form>
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
