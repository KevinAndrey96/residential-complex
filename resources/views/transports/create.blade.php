@extends('layouts.dashboard')
@section('content')
    @if (Session::has('addTransportFail'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('addTransportFail') }}
        </div>
    @endif
    @if (Session::has('addBicycleTransportFail'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('addBicycleTransportFail') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Añadir medio de transporte</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/transports/store">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="selectTransport">Nuevo medio de transporte </label>
                        <select class="form-control" name="selectTransport" id="selectTransport" onchange="showTransport()">
                            <option disabled selected></option>
                            <option value="motorcycle">Motocicleta</option>
                            <option value="car">Carro</option>
                            <option value="bicycle">Bicicleta</option>
                        </select>
                    </div>
                    <div style="display: none" class="form-group col-md-2" id="divColor">
                        <label for="color">Color</label>
                        <input class="form-control" type="text" name="color" id="color" required>
                    </div>
                    <div lass="form-group col-md-6" style="display:none" id="divMotoCar" >
                        <div class="form-group col-md-2">
                            <label for="brand">Marca</label>
                            <input class="form-control" type="text" name="brand" id="brand" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="plaque">Placa</label>
                            <input class="form-control" type="text" name="plaque" id="plaque" required>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="model">Modelo</label>
                            <input class="form-control" type="text" name="model" id="model" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="parkingnum">N° parqueadero</label>
                            <input class="form-control" type="text" name="parkingnum" id="parkingnum" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ownparking">¿Parqueadero propio?</label>
                            <select class="form-control" name="ownparking" id="ownparking" onchange="parkingOwner()" required>
                                <option value="yes">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div style="display: none" class="form-group col-md-3" id="divOwner" >
                            <label for="owner">Nombre del dueño del parqueadero </label>
                            <input class="form-control" type="text" name="owner" id="owner">
                        </div>
                    </div>
                    <div class="form-group col-md-6" id="divBicycle" style="display: none">
                        <div class="form-group col-md-3">
                            <label for="numserie">N° serie</label>
                            <input class="form-control" type="number" name="numserie" id="numserie" min="1" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bicyclerack">N° bicicletero</label>
                            <input class="form-control" type="number" name="bicyclerack" id="bicyclerack" min="1" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bicycleperiod">Periodo mensual de uso</label>
                            <input class="form-control" type="number" name="bicycleperiod" id="bicycleperiod" min="1" required>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
                        <input type="hidden" name="type" id="type" value="">
                        <input style="padding: 10px 30px;" type="submit" class="btn btn-primary btn-round" value="Añadir">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var divMotoCar = document.getElementById('divMotoCar');
        var divBicycle = document.getElementById('divBicycle');
        var selectTransport = document.getElementById('selectTransport');
        var divColor = document.getElementById('divColor');
        var inputBrand = document.getElementById('brand');
        var inputPlaque = document.getElementById('plaque');
        var inputModel = document.getElementById('model');
        var inputParkingnum = document.getElementById('parkingnum');
        var inputOwnparking = document.getElementById('ownparking');
        var inputOwner = document.getElementById('owner');
        var inputNumserie = document.getElementById('numserie');
        var inputBicyclerack = document.getElementById('bicyclerack');
        var inputBicycleperiod = document.getElementById('bicycleperiod');
        var inputType = document.getElementById('type');
        var divOwner = document.getElementById('divOwner');

        function showTransport()
        {
            if (selectTransport.value == 'motorcycle' || selectTransport.value == 'car') {
                inputBrand.disabled = false;
                inputPlaque.disabled = false;
                inputModel.disabled = false;
                inputParkingnum.disabled = false;
                inputOwnparking.disabled = false;
                inputOwner.disabled = false;
                divMotoCar.style.display = 'block';
                divColor.style.display = 'block';
                divBicycle.style.display = 'none';
                inputNumserie.disabled = true;
                inputBicyclerack.disabled = true;
                inputBicycleperiod.disabled = true;

                if (selectTransport.value == 'motorcycle') {
                    inputType.value = 'motorcycle';
                }

                if (selectTransport.value == 'car') {
                    inputType.value = 'car';
                }
            } else {
                inputNumserie.disabled = false;
                inputBicyclerack.disabled = false;
                inputBicycleperiod.disabled = false;
                divMotoCar.style.display = 'none';
                divBicycle.style.display = 'block';
                divColor.style.display = 'block';
                inputBrand.disabled = true;
                inputPlaque.disabled = true;
                inputModel.disabled = true;
                inputParkingnum.disabled = true;
                inputOwnparking.disabled = true;
                inputOwner.disabled = true;
                inputType.value = 'bicycle';
            }
        }

        function parkingOwner()
        {
            if (inputOwnparking.value == 'no') {
                divOwner.style.display = 'block';
                inputOwner.disabled = false;
            } else {
                divOwner.style.display = 'none';
                inputOwner.disabled = true;
            }
        }
    </script>

@endsection
