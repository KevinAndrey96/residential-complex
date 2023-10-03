@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize  mx-6 ">
                                Plazas de parqueadero
                                @if (Auth::user()->role == 'Administrator')
                                    <a href="#" id="btn-add" class="btn" >
                                        <i style="color: white; margin-top: 13px;" class="material-icons opacity-10 p-0">add</i>
                                    </a>
                                @endif
                                <a href="{{route('parkings.index', $id)}}" class="btn p-0" ><i style="color: white; margin-top: 13px;" class="material-icons opacity-10 p-0">keyboard_return</i></a>
                            </h6>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-12 mt-4">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap"
                                                       width="100%" cellspacing="0">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Número</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Tipo</th>
                                                        @if (Auth::user()->role == 'Administrator')
                                                            <th style="padding:10px;" class="text-center text-md-center align-middle">Habilitado</th>
                                                        @endif
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Estado</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-center text-md-center align-middle">
                                                    </tbody>
                                                </table>
                                                <input type="hidden" name="parkingSpaceID" id="parkingSpaceID">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
    <div class="modal fade" id="editParkingSpaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Editar plaza</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="number">Número</label>
                                <input class="form-control" type="text" name="number" id="numEdit" required>
                            </div>
                            <div class="form-group col-md-6 d-flex justify-content-center mt-4">
                                <select class="my-select" id="typeEdit" name="type" aria-label="select example" data-header="Tipo">
                                    <option value="car">Carro</option>
                                    <option value="motorcycle">Moto</option>
                                </select>
                            </div>

                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <input type="submit" class="btn btn-success" id="btn-upload" value="Modificar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
    <!-- Modal-->
    <div class="modal fade" id="createParkingSpaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Crear plaza</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="number">Número</label>
                                <input class="form-control" type="text" name="number" id="numCreate" required>
                            </div>
                            <div class="form-group col-md-6 d-flex justify-content-center mt-4">
                                <select class="my-select" id="typeCreate" name="type" aria-label="select example" data-header="Tipo">
                                    <option value="car">Carro</option>
                                    <option value="motorcycle">Moto</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 d-flex justify-content-center mt-4">
                                <select class="my-select" id="statusCreate" name="statusCreate" aria-label="select example" data-header="Estado">
                                    <option value="0">Desocupado</option>
                                    <option value="1">Ocupado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 d-flex justify-content-center mt-4">
                                <select class="my-select" id="enabledCreate" name="type" aria-label="select example" data-header="Estado">
                                    <option value="1">Habilitado</option>
                                    <option value="0">Deshabilitado</option>
                                </select>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <input type="submit" class="btn btn-success" id="btn-store" value="Crear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
    <!-- Modal-->
    <div class="modal fade" id="arrivalDetailOccupationSpaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Asignación de plaza de estacionamiento</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="number">Nombre del visitante</label>
                                <input class="form-control" type="text" name="visitantName" id="visitantName" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="number">Placa del vehículo</label>
                                <input class="form-control" type="text" name="plate" id="plate" required>
                            </div>
                            <div class="form-group col-md-6 d-flex justify-content-center mt-4">
                                <select class="my-select" id="towerAndApt" name="type" aria-label="select example" data-live-search="true" data-actions-box="true" data-header="Apto">
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="arrivalObservations">Observaciones de llegada:</label>
                                <textarea class="form-control" id="arrivalObservations" name="arrivalObservations" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <input type="submit" class="btn btn-success" id="btn-arrival" value="Asignar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
    <!-- Modal-->
    <div class="modal fade" id="departureDetailOccupationSpaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Desocupar plaza de estacionamiento</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!--
                            <div class="form-group col-md-12">
                                    <label for="arrivalObservations">Observaciones de salida:</label>
                                    <textarea class="form-control" id="departureObservations" name="departureObservations" rows="3"></textarea>
                            </div>
                            -->
                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <input type="submit" class="btn btn-success" id="btn-departure" value="Desocupar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datatable').DataTable({
                ajax: {
                    "url": '{{route('parkingSpaces.getByParkingID', ['id' => $id])}}',
                    "type": "GET",
                    "debug": true,
                },
                columns: [
                    {data: 'num'},
                    {data: 'type', render: function(data, type, row) {
                            if (data == 'car') {
                                return 'Carro';
                            }
                            if (data == 'motorcycle') {
                                return 'Moto';
                            }
                        }
                    },
                    @if (Auth::user()->role == 'Administrator')
                    {data: 'enabled', render: function(data, type, row) {
                            if (data == 1) {
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Habilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled('+row.id+', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"'+
                                    ' data-off="Deshabilitado"'+
                                    ' data-size="xs"'+
                                    ' data-toggle="toggle"'+
                                    ' name="toggleEnabled" id="toggleEnabled"'+
                                    ' onchange="changeEnabled('+row.id+', 1)">';
                            }
                        }
                    },
                    @endif
                    {data: 'status', render: function(data, type, row) {
                            if (data == 1) {
                                return '<p class="text-danger font-weight-bold">OCUPADO</p>';
                            } else if (data == 0) {
                                return '<p class="text-success font-weight-bold">DESOCUPADO</p>';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            @if (Auth::user()->role == 'Administrator')
                            return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @elseif (Auth::user()->role == 'Watchman')
                                return '<div class="d-flex justify-content-center">' +
                                    '<div class="d-inline">' +
                                    '<a style="color: darkblue;" href="#" title="Asignar espacio" ' +
                                    'class="btn btn-link px-1 mb-0" onclick="showSpaceAssignmentModal('+data+')">'+
                                    '<i style="color: darkblue; font-size: 25px !important;" ' +
                                    'class="material-icons opacity-10">' +
                                    'swap_horiz</i></a>'+
                                    '</div>'+
                                    '<div class="d-inline">' +
                                    '<a style="color: green;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                        '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                            'history_edu</i></a>'+
                                    '</div>'+
                                    '</div>';
                            @endif
                        }}
                ],
                "bDestroy": true,
                "paging": false,
                drawCallback: function() {
                    $('input[type="checkbox"][data-toggle="toggle"]').bootstrapToggle();
                }
            });
            $("#datatable").dataTable().fnDestroy();

            $('#toggleEnabled').on('change', function() {
                $('#createParkingModal').modal('show');
            });

        });


        function changeEnabled(id, value)
        {
            $('#datatable').DataTable({
                ajax: {
                    "url":'/api/changeEnabled/'+id+'/'+value,
                    "type": "GET",
                    "debug": true,
                },
                columns: [
                    {data: 'num'},
                    {data: 'type', render: function(data, type, row) {
                            if (data == 'car') {
                                return 'Carro';
                            }
                            if (data == 'motorcycle') {
                                return 'Moto';
                            }
                        }
                    },
                        @if (Auth::user()->role == 'Administrator')
                    {data: 'enabled', render: function(data, type, row) {
                            if (data == 1) {
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Habilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled('+row.id+', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"'+
                                    ' data-off="Deshabilitado"'+
                                    ' data-size="xs"'+
                                    ' data-toggle="toggle"'+
                                    ' name="toggleEnabled" id="toggleEnabled"'+
                                    ' onchange="changeEnabled('+row.id+', 1)">';
                            }
                        }
                    },
                        @endif
                    {data: 'status', render: function(data, type, row) {
                            if (data == 1) {
                                return '<p class="text-danger font-weight-bold">OCUPADO</p>';
                            } else if (data == 0) {
                                return '<p class="text-success font-weight-bold">DESOCUPADO</p>';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            @if (Auth::user()->role == 'Administrator')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @elseif (Auth::user()->role == 'Watchman')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="#" title="Asignar espacio" ' +
                                'class="btn btn-link px-1 mb-0" onclick="showSpaceAssignmentModal('+data+')">'+
                                '<i style="color: darkblue; font-size: 25px !important;" ' +
                                'class="material-icons opacity-10">' +
                                'swap_horiz</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @endif
                        }}
                ],
                "bDestroy": true,
                drawCallback: function() {
                    $('input[type="checkbox"][data-toggle="toggle"]').bootstrapToggle();
                }
            });
        }

        function changeStatus(id, value)
        {
            $('#datatable').DataTable({
                ajax: {
                    "url":'/api/changeStatus/'+id+'/'+value,
                    "type": "GET",
                    "debug": true,
                },
                columns: [
                    {data: 'num'},
                    {data: 'type', render: function(data, type, row) {
                            if (data == 'car') {
                                return 'Carro';
                            }
                            if (data == 'motorcycle') {
                                return 'Moto';
                            }
                        }
                    },
                        @if (Auth::user()->role == 'Administrator')
                    {data: 'enabled', render: function(data, type, row) {
                            if (data == 1) {
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Habilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled('+row.id+', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"'+
                                    ' data-off="Deshabilitado"'+
                                    ' data-size="xs"'+
                                    ' data-toggle="toggle"'+
                                    ' name="toggleEnabled" id="toggleEnabled"'+
                                    ' onchange="changeEnabled('+row.id+', 1)">';
                            }
                        }
                    },
                        @endif
                    {data: 'status', render: function(data, type, row) {
                            if (data == 1) {
                                return '<p class="text-danger font-weight-bold">OCUPADO</p>';
                            } else if (data == 0) {
                                return '<p class="text-success font-weight-bold">DESOCUPADO</p>';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            @if (Auth::user()->role == 'Administrator')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @elseif (Auth::user()->role == 'Watchman')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="#" title="Asignar espacio" ' +
                                'class="btn btn-link px-1 mb-0" onclick="showSpaceAssignmentModal('+data+')">'+
                                '<i style="color: darkblue; font-size: 25px !important;" ' +
                                'class="material-icons opacity-10">' +
                                'swap_horiz</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @endif
                        }}
                ],
                "bDestroy": true,
                drawCallback: function() {
                    $('input[type="checkbox"][data-toggle="toggle"]').bootstrapToggle();
                }
            });
        }

        function setEditFields(id)
        {
            $.ajax({
                url: '/api/parking-space-edit/'+id,
                type: 'GET',
                success: function(data) {
                    $('#numEdit').val(data.num);
                    $('#typeEdit').val(data.type).prop('selected', true);
                    $('#parkingSpaceID').val(data.id);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('ha ocurrido un error');
                }
            });
            $('#editParkingSpaceModal').modal('show');
        }

        $('#btn-add').on('click', function() {
            $('#createParkingSpaceModal').modal('show');

        });

        $('#btn-store').on('click', function() {
            var data = {
                num: $('#numCreate').val(),
                type: $('#typeCreate').val(),
                status: $('#statusCreate').val(),
                enabled: $('#enabledCreate').val(),
                id: parseInt({{$id}})
            };

            $("#datatable").dataTable().fnDestroy();

            $('#datatable').DataTable({
                ajax: {
                    "url": '{{route('parkingSpaces.store')}}',
                    "type": "POST",
                    "data": data,
                    "debug": true,
                },
                columns: [
                    {data: 'num'},
                    {
                        data: 'type', render: function (data, type, row) {
                            if (data == 'car') {
                                return 'Carro';
                            }
                            if (data == 'motorcycle') {
                                return 'Moto';
                            }
                        }
                    },
                        @if (Auth::user()->role == 'Administrator')
                    {
                        data: 'enabled', render: function (data, type, row) {
                            if (data == 1) {
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Habilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"' +
                                    ' data-off="Deshabilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 1)">';
                            }
                        }
                    },
                        @endif
                    {data: 'status', render: function(data, type, row) {
                            if (data == 1) {
                                return '<p class="text-danger font-weight-bold">OCUPADO</p>';
                            } else if (data == 0) {
                                return '<p class="text-success font-weight-bold">DESOCUPADO</p>';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            @if (Auth::user()->role == 'Administrator')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @elseif (Auth::user()->role == 'Watchman')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="#" title="Asignar espacio" ' +
                                'class="btn btn-link px-1 mb-0" onclick="showSpaceAssignmentModal('+data+')">'+
                                '<i style="color: darkblue; font-size: 25px !important;" ' +
                                'class="material-icons opacity-10">' +
                                'swap_horiz</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @endif
                        }}
                ],
                "bDestroy": true,
                drawCallback: function () {
                    $('input[type="checkbox"][data-toggle="toggle"]').bootstrapToggle();
                }
            });

            $('#createParkingSpaceModal').modal('hide');
        });

        $('#btn-upload').on('click', function() {
            var data = {
                num: $('#numEdit').val(),
                type: $('#typeEdit').val(),
                id: $('#parkingSpaceID').val()
            };

            $("#datatable").dataTable().fnDestroy();

            $('#datatable').DataTable({
                ajax: {
                    "url": '{{route('parkingSpaces.update')}}',
                    "type": "POST",
                    "data": data,
                    "debug": true,
                },
                columns: [
                    {data: 'num'},
                    {
                        data: 'type', render: function (data, type, row) {
                            if (data == 'car') {
                                return 'Carro';
                            }
                            if (data == 'motorcycle') {
                                return 'Moto';
                            }
                        }
                    },
                        @if (Auth::user()->role == 'Administrator')
                    {
                        data: 'enabled', render: function (data, type, row) {
                            if (data == 1) {
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Habilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"' +
                                    ' data-off="Deshabilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 1)">';
                            }
                        }
                    },
                        @endif
                    {data: 'status', render: function(data, type, row) {
                            if (data == 1) {
                                return '<p class="text-danger font-weight-bold">OCUPADO</p>';
                            } else if (data == 0) {
                                return '<p class="text-success font-weight-bold">DESOCUPADO</p>';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            @if (Auth::user()->role == 'Administrator')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @elseif (Auth::user()->role == 'Watchman')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="#" title="Asignar espacio" ' +
                                'class="btn btn-link px-1 mb-0" onclick="showSpaceAssignmentModal('+data+')">'+
                                '<i style="color: darkblue; font-size: 25px !important;" ' +
                                'class="material-icons opacity-10">' +
                                'swap_horiz</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @endif
                        }}
                ],
                "bDestroy": true,
                drawCallback: function () {
                    $('input[type="checkbox"][data-toggle="toggle"]').bootstrapToggle();
                }
            });
            $('#editParkingSpaceModal').modal('hide');
        });

        $('#btn-arrival').on('click', function() {
            var data = {
                visitant_name: $('#visitantName').val(),
                plate: $('#plate').val(),
                apto: $('#towerAndApt').val(),
                arrival_observation: $('#arrivalObservations').val(),
                parking_space_id: $('#parkingSpaceID').val()
            };

            $("#datatable").dataTable().fnDestroy();
            $('#datatable').DataTable({
                ajax: {
                    "url": '{{route('detailSpaceOccupations.store')}}',
                    "type": "POST",
                    "data": data,
                    "debug": true,
                },
                columns: [
                    {data: 'num'},
                    {
                        data: 'type', render: function (data, type, row) {
                            if (data == 'car') {
                                return 'Carro';
                            }
                            if (data == 'motorcycle') {
                                return 'Moto';
                            }
                        }
                    },
                        @if (Auth::user()->role == 'Administrator')
                    {
                        data: 'enabled', render: function (data, type, row) {
                            if (data == 1) {
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Habilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"' +
                                    ' data-off="Deshabilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 1)">';
                            }
                        }
                    },
                        @endif
                    {data: 'status', render: function(data, type, row) {
                            if (data == 1) {
                                return '<p class="text-danger font-weight-bold">OCUPADO</p>';
                            } else if (data == 0) {
                                return '<p class="text-success font-weight-bold">DESOCUPADO</p>';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            @if (Auth::user()->role == 'Administrator')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @elseif (Auth::user()->role == 'Watchman')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="#" title="Asignar espacio" ' +
                                'class="btn btn-link px-1 mb-0" onclick="showSpaceAssignmentModal('+data+')">'+
                                '<i style="color: darkblue; font-size: 25px !important;" ' +
                                'class="material-icons opacity-10">' +
                                'swap_horiz</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @endif
                        }}
                ],
                "bDestroy": true,
                drawCallback: function () {
                    $('input[type="checkbox"][data-toggle="toggle"]').bootstrapToggle();
                }
            });
            $('#arrivalDetailOccupationSpaceModal').modal('hide');
        });

        $('#btn-departure').on('click', function(){
            var data = {
                parking_space_id: $('#parkingSpaceID').val()
            };

            $("#datatable").dataTable().fnDestroy();

            $('#datatable').DataTable({
                ajax: {
                    "url": '{{route('detailSpaceOccupations.update')}}',
                    "type": "POST",
                    "data": data,
                    "debug": true,
                },
                columns: [
                    {data: 'num'},
                    {
                        data: 'type', render: function (data, type, row) {
                            if (data == 'car') {
                                return 'Carro';
                            }
                            if (data == 'motorcycle') {
                                return 'Moto';
                            }
                        }
                    },
                        @if (Auth::user()->role == 'Administrator')
                    {
                        data: 'enabled', render: function (data, type, row) {
                            if (data == 1) {
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Habilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"' +
                                    ' data-off="Deshabilitado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeEnabled(' + row.id + ', 1)">';
                            }
                        }
                    },
                        @endif
                    {data: 'status', render: function(data, type, row) {
                            if (data == 1) {
                                return '<p class="text-danger font-weight-bold">OCUPADO</p>';
                            } else if (data == 0) {
                                return '<p class="text-success font-weight-bold">DESOCUPADO</p>';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            @if (Auth::user()->role == 'Administrator')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @elseif (Auth::user()->role == 'Watchman')
                                return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: darkblue;" href="#" title="Asignar espacio" ' +
                                'class="btn btn-link px-1 mb-0" onclick="showSpaceAssignmentModal('+data+')">'+
                                '<i style="color: darkblue; font-size: 25px !important;" ' +
                                'class="material-icons opacity-10">' +
                                'swap_horiz</i></a>'+
                                '</div>'+
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="/detail-space-occupation-history/'+data+'" title="Historial" class="btn btn-link px-1 mb-0">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'history_edu</i></a>'+
                                '</div>'+
                                '</div>';
                            @endif
                        }}
                ],
                "bDestroy": true,
                drawCallback: function () {
                    $('input[type="checkbox"][data-toggle="toggle"]').bootstrapToggle();
                }
            });
            $('#departureDetailOccupationSpaceModal').modal('hide');
        });

        function showSpaceAssignmentModal(id)
        {
            $.ajax({
                url: '/api/parking-space-edit/'+id,
                type: 'GET',
                success: function(parkingSpaceData) {
                    $('#parkingSpaceID').val(id);
                    if (parkingSpaceData.status == 0) {
                        $.ajax({
                            url: '{{route('residents.getAll')}}',
                            type: 'GET',
                            success: function(response) {
                                $('#towerAndApt').empty();
                                $.each(response.data, function(key, value) {
                                    $('#towerAndApt').append('<option value="Torre:' + value.attributes.tower.toString() + ' Apto:'+  value.attributes.apt.toString() +'">Torre:' + value.attributes.tower.toString() +' Apto:' + value.attributes.apt.toString() + '</option>');
                                });
                                $('#towerAndApt').selectpicker('refresh');
                                $('#arrivalDetailOccupationSpaceModal').modal('show');
                            }
                        });
                    } else {
                        $('#departureDetailOccupationSpaceModal').modal('show');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('ha ocurrido un error');
                }
            });
        }
    </script>
@endsection
