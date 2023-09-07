@extends('layouts.dashboard')
@section('content')
    @if(Session::has('successfulPayment'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successfulPayment') }}
        </div>
    @endif
    @if (Session::has('thereIsAlreadyAPayment'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('thereIsAlreadyAPayment') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-success shadow-primary border-radius-lg pt-1 pb-0">
                                <h6 class="text-white text-center text-capitalize  mx-6 ">
                                    Pagos de administración <a href="{{route('payments.create')}}" class="btn"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10 p-0">add</i></a>
                                </h6>
                            </div>
                        <div class="card-body px-0 pb-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4 form-group d-flex justify-content-center">
                                    <select class="my-select" id="years-select" name="years[]" multiple aria-label="multiple select example" data-live-search="true" data-header="Año" data-actions-box="true">
                                        @foreach ($years as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group d-flex justify-content-center">
                                    <select class="my-select" id="months-select" name="months[]" multiple aria-label="multiple select example" data-live-search="true" data-header="Mes" data-actions-box="true">
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group d-flex justify-content-center">
                                    <select class="my-select" id="userIDS" name="userIDS" multiple aria-label="multiple select example" data-live-search="true" data-header="Apartamento" data-actions-box="true">
                                        @foreach ($residents as $resident)
                                            <option value="{{$resident->id}}">Torre {{$resident->resident->tower}} Apto {{$resident->resident->apt}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-success mt-4" value="ver pagos" id="btn-show">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap"
                                               width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Año</th>
                                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Mes</th>
                                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Apartamento</th>
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
    <script type="text/javascript">

        /*
        var years = $('select[name="years-select"]').val();
        var months = $('select[name="months-select"]').val();
        var userIDS = $('select[name="ids-select"]').val();
        */

        $(document).ready(function() {
            $('#btn-show').click(function() {
                var years = $('#years-select').val();
                var months = $('#months-select').val();
                var userIDS = $('#userIDS').val();
                console.log(userIDS);

                $("#datatable").dataTable().fnDestroy();
                $('#datatable').DataTable({
                    ajax: {
                        "url": '{{route('payments.get-certain')}}',
                        "type": "POST",
                        "data": {
                            years: years,
                            months: months,
                            userIDS: userIDS
                        },
                        "debug": true,
                    },
                    columns: [
                        {data: 'year'},
                        {data: 'month', render: function(data, type, row) {
                            if (data == 1) {
                                return 'Enero';
                            }
                                if (data == 2) {
                                    return 'Febrero';
                                }
                                if (data == 3) {
                                    return 'Marzo';
                                }
                                if (data == 4) {
                                    return 'Abril';
                                }
                                if (data == 5) {
                                    return 'Mayo';
                                }
                                if (data == 6) {
                                    return 'Junio';
                                }
                                if (data == 7) {
                                    return 'Julio';
                                }
                                if (data == 8) {
                                    return 'Agosto';
                                }
                                if (data == 9) {
                                    return 'Septiembre';
                                }
                                if (data == 10) {
                                    return 'Octubre';
                                }
                                if (data == 11) {
                                    return 'Noviembre';
                                }
                                if (data == 12) {
                                    return 'Diciembre';
                                }

                        }},
                        {
                            data: 'user_id',
                            render: function(data, type, row) {
                                return  'Torre' + ' ' + row.user.resident.tower.toString() + ' ' + 'Apto' + ' ' + row.user.resident.apt.toString();
                            }

                        }
                    ],
                    "pageLength": 15,
                    "aaSorting": [],
                    "bDestroy": true
                });
            });
        });
    </script>
@endsection
