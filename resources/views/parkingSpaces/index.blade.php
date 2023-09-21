@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize  mx-6 ">
                                Plazas de parqueadero <a href="{{route('parkings.index', $id)}}" id="btn-add" class="btn" ><i style="color: white; margin-top: 13px;" class="material-icons opacity-10 p-0">keyboard_return</i></a>
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
    <div class="modal fade" id="editParkingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Editar parqueadero</h6>
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
                            <div class="form-group col-md-6">
                                <label for="type">Tipo</label>
                                <input class="form-control" type="number" min="1" name="type" step="1" id="typeEdit" required>
                            </div>
                            <input type="hidden" name="parkingSpaceID" id="parkingSpaceID">
                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <input type="submit" class="btn btn-success" id="btn-upload" value="Modificar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Ocupado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeStatus('+row.id+', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"'+
                                    ' data-off="Desocupado"'+
                                    ' data-size="xs"'+
                                    ' data-toggle="toggle"'+
                                    ' name="toggleEnabled" id="toggleEnabled"'+
                                    ' onchange="changeStatus('+row.id+', 1)">';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'
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
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Ocupado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeStatus('+row.id+', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"'+
                                    ' data-off="Desocupado"'+
                                    ' data-size="xs"'+
                                    ' data-toggle="toggle"'+
                                    ' name="toggleEnabled" id="toggleEnabled"'+
                                    ' onchange="changeStatus('+row.id+', 1)">';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'
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
                                return '<input type="checkbox" data-onstyle="success" checked' +
                                    ' data-on="Ocupado"' +
                                    ' data-size="xs"' +
                                    ' data-toggle="toggle"' +
                                    ' name="toggleEnabled" id="toggleEnabled"' +
                                    ' onchange="changeStatus('+row.id+', 0)">';
                            } else if (data == 0) {
                                return '<input type="checkbox" data-onstyle="success"'+
                                    ' data-off="Desocupado"'+
                                    ' data-size="xs"'+
                                    ' data-toggle="toggle"'+
                                    ' name="toggleEnabled" id="toggleEnabled"'+
                                    ' onchange="changeStatus('+row.id+', 1)">';
                            }
                        }
                    },
                    {data: 'id', render: function(data, type, row) {
                            return '<div class="d-flex justify-content-center">' +
                                '<div class="d-inline">' +
                                '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                'edit</i></a>'+
                                '</div>'
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
                    $('#typeEdit').val(data.status);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('ha ocurrido un error');
                }
            });
            $('#editParkingModal').modal('show');
        }

    </script>
@endsection
