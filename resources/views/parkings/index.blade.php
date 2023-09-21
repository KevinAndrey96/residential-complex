@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize  mx-6 ">
                                Parqueaderos <a href="#" id="btn-add" class="btn" ><i style="color: white; margin-top: 13px;" class="material-icons opacity-10 p-0">add</i></a>
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
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Nombre</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Capacidad</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Tipo</th>
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
    <div class="modal fade" id="createParkingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Crear parqueadero</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre</label>
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Capacidad</label>
                                <input class="form-control" type="number" min="1" name="capacity" step="1" id="capacity" required>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-2">
                                <div class="form-group col-md-6 d-flex justify-content-center">
                                    <select class="my-select" id="type" name="type" aria-label="select example" data-header="Tipo">
                                            <option value="open">Aire libre</option>
                                            <option value="basement">Sotano</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <input type="submit" class="btn btn-success" id="btn-send" value="Guardar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Close Modal-->
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
                                <label for="name">Nombre</label>
                                <input class="form-control" type="text" name="name" id="nameEdit" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Capacidad</label>
                                <input class="form-control" type="number" min="1" name="capacityEdit" step="1" id="capacityEdit" required>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-2">
                                <div class="form-group col-md-6 d-flex justify-content-center">
                                    <select class="my-select" id="typeEdit" name="type" aria-label="select example" data-header="Tipo">
                                        <option value="open">Aire libre</option>
                                        <option value="basement">Sotano</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="parkingID" id="parkingID">
                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <input type="submit" class="btn btn-success" id="btn-upload" value="Modificar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Close Modal-->

    <script type="text/javascript">
        $(document).ready(function(){
            $('#datatable').DataTable({
                ajax: {
                    "url": '{{route('parkings.get-all')}}',
                    "type": "GET",
                    "debug": true,
                },
                columns: [
                    {data: 'name'},
                    {data: 'capacity'},
                    {data: 'type', render: function(data, type, row) {
                            if (data == 'open') {
                                return 'Aire libre';
                            }
                            if (data == 'basement') {
                                return 'Sotano';
                            }
                    }},
                    {data: 'id', render: function(data, type, row) {
                            return '<div class="d-flex justify-content-center">' +
                                        '<div class="d-inline">' +
                                            '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                            '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                            'edit</i></a>'+
                                        '</div>'+
                                        '<div class="d-inline">' +
                                            '<a style="color: darkblue;" href="/parking-spaces/'+data+'" title="Plazas de estacionamiento" class="btn btn-link px-1 mb-0">' +
                                            '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                            'directions_car</i></a>'+
                                        '</div>'+
                                    '</div>'
                        }}
                ],
                "bDestroy": true
            });


            $("#datatable").dataTable().fnDestroy();
            $('#btn-add').on('click', function() {
                $('#createParkingModal').modal('show');
            });

            $('#btn-send').on('click', function() {
                var data = {
                    name: $('#name').val(),
                    capacity: $('#capacity').val(),
                    type: $('#type').val()
                }

                $("#datatable").dataTable().fnDestroy();
                $('#datatable').DataTable({
                    "bServerSide": false,
                    ajax: {
                        "url": '{{route('parkings.store')}}',
                        "type": "POST",
                        "data": data,
                        "debug": true,
                    },
                    columns: [
                        {data: 'name'},
                        {data: 'capacity'},
                        {data: 'type', render: function(data, type, row) {
                                if (data == 'open') {
                                    return 'Aire libre';
                                }
                                if (data == 'basement') {
                                    return 'Sotano';
                                }
                        }},
                        {data: 'id', render: function(data, type, row) {
                                return '<div class="d-flex justify-content-center">' +
                                    '<div class="d-inline">' +
                                    '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                    '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                    'edit</i></a>'+
                                    '</div>'+
                                    '<div class="d-inline">' +
                                    '<a style="color: darkblue;" href="#" title="Plazas de estacionamiento" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                    '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                    'directions_car</i></a>'+
                                    '</div>'+
                                    '</div>'
                            }}

                    ],
                    success: function(){
                        $('#createParkingModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
                $('#createParkingModal').modal('hide');
            });

            $('#btn-upload').on('click', function() {
                var data = {
                    name: $('#nameEdit').val(),
                    capacity: $('#capacityEdit').val(),
                    type: $('#typeEdit').val(),
                    id: $('#parkingID').val(),
                };

                $("#datatable").dataTable().fnDestroy();

                $('#datatable').DataTable({
                    ajax: {
                        "url": '{{route('parkings.update')}}',
                        "type": "POST",
                        "data": data,
                        "debug": true,
                    },
                    columns: [
                        {data: 'name'},
                        {data: 'capacity'},
                        {data: 'type', render: function(data, type, row) {
                                if (data == 'open') {
                                    return 'Aire libre';
                                }
                                if (data == 'basement') {
                                    return 'Sotano';
                                }
                            }},
                        {data: 'id', render: function(data, type, row) {
                                return '<div class="d-flex justify-content-center">' +
                                    '<div class="d-inline">' +
                                    '<a style="color: green;" href="#" title="Editar" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                    '<i style="color: green; font-size: 25px !important;" class="material-icons opacity-10">' +
                                    'edit</i></a>'+
                                    '</div>'+
                                    '<div class="d-inline">' +
                                    '<a style="color: darkblue;" href="#" title="Plazas de estacionamiento" class="btn btn-link px-1 mb-0" onclick="setEditFields('+data+')">' +
                                    '<i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">' +
                                    'directions_car</i></a>'+
                                    '</div>'+
                                    '</div>'
                            }}
                    ],
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
                $('#editParkingModal').modal('hide');
            });
        });

        function setEditFields(id)
        {
            $.ajax({
                url: '/api/parkings-edit/'+id,
                type: 'GET',
                success: function(data) {
                    $('#nameEdit').val(data.name);
                    $('#capacityEdit').val(data.capacity);
                    $('#typeEdit').val('').prop('selected', true);
                    $('#typeEdit').val(data.type).prop('selected', true);
                    $('#parkingID').val(data.id);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('ha ocurrido un error');
                }
            });
            $('#editParkingModal').modal('show');
        }
    </script>

@endsection
