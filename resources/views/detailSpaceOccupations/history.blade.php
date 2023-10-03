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
                            <h6 class="text-white text-center text-capitalize mx-6">
                                Historial de plaza
                                <a href="{{route('parkingSpaces.index', ['id' => $parkingID])}}" id="btn-add" class="btn p-0" >
                                    <i style="color: white; margin-top: 13px;" class="material-icons opacity-10 p-0">keyboard_return</i>
                                </a>
                            </h6>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-12 mt-4">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table table-striped table-hover dt-responsive display"
                                                       width="100%" cellspacing="0">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Nombre visitante</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Placa vehículo</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Apartamento</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Hora de llegada</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Hora de salida</th>
                                                        <th style="padding:10px;" class="text-center text-md-center align-middle">Observación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-center text-md-center align-middle">
                                                        @foreach ($detailSpaceOccupations as $detailSpaceOccupation)
                                                            <tr class="text-center text-md-center align-middle">
                                                                <td>{{$detailSpaceOccupation->visitant_name}}</td>
                                                                <td>{{$detailSpaceOccupation->plate}}</td>
                                                                <td>{{$detailSpaceOccupation->apto}}</td>
                                                                <td>{{$detailSpaceOccupation->created_at}}</td>
                                                                <td>{{$detailSpaceOccupation->updated_at}}</td>
                                                                <td><p style="word-wrap: break-word !important;">{{$detailSpaceOccupation->arrival_observation}}</p></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
