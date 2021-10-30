@extends('layouts.dashboard')
@section('content')
    @if (Session::has('addTransportSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('addTransportSuccess') }}
        </div>
    @endif
    @if (Session::has('deleteTransportSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleteTransportSuccess') }}
        </div>
    @endif
    @if (Session::has('createPetSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('createPetSuccess') }}
        </div>
    @endif
    @if (Session::has('deletePetSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deletePetSuccess') }}
        </div>
    @endif
    @if (Session::has('createHabitantSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('createHabitantSuccess') }}
        </div>
    @endif
    @if (Session::has('deleteHabitantSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleteHabitantSuccess') }}
        </div>
    @endif


    <div class="card">
        <div class="card-header">
            Información extra
        </div>
        <div class="card-body container-fluid" >
            @if($user->extrainfo == 1)

            <h1>Interior {{ $user->resident->tower }}-Apartamento {{ $user->resident->apt }}</h1>
            <br/>
            <br/>
            <br/>
            <h3>Datos del residente</h3>
            <br/>
            <br/>
            <p style="font-size: 16px"><b>Nombre: </b> {{ $residentData->name }}</p>
            <p style="font-size: 16px"><b>Tipo de residente: </b> {{$residentData->residenttype}}</p>
            <p style="font-size: 16px"><b>Tipo de documento: </b> {{$residentData->document_type}}</p>
            <p style="font-size: 16px"><b>Número de documento: </b> {{$residentData->document}}</p>
            <p style="font-size: 16px"><b>Número de teléfono: </b> {{$residentData->phone}}</p>
            <p style="font-size: 16px"><b>Número de celular: </b> {{$residentData->mobile}}</p>
            <p style="font-size: 16px"><b>Email: </b> {{$residentData->email}}</p>
            <p style="font-size: 16px"><b>Actividad económica: </b> {{$residentData->job}}</p>
            <p style="font-size: 16px"><b>Dirección adicional de notificaciones: </b> {{$residentData->address}}</p>
                @if($residentData->residenttype == 'Arrendatario')
                    <p style="font-size: 16px"><b>Fecha de ingreso a la copropiedad: </b> {{$residentData->dateadmission}}</p>
                @endif
                <p style="font-size: 16px"><b>Cómo desea participar: </b> {{$residentData->howcontribute}}</p>
            <p style="font-size: 16px"><b>Temas de convivencia que le gustaría que se enviará a su correo  electrónico: </b></p>
            <ol>
                @foreach($themes as $theme)
                    <li><p style="font-size: 16px">{{ $theme }}</p></li>
                @endforeach
            </ol>
            <p style="font-size: 16px"><b>Número de depósito: </b> {{$residentData->depositnum}}</p>
            <p style="font-size: 16px"><b>Número de tarjeta de acceso: </b> {{$residentData->cardnum}}</p>
                @if($residentData->residenttype == 'Propietario')
                <p style="font-size: 16px"><b>Vive actualmento en la propiedad: </b>
                    @if($residentData->livein == 1)
                        Si
                    @else
                        No
                    @endif
                </p>
                @endif
                @if($residentData->residenttype == 'Propietario')
                <p style="font-size: 16px"><b>Desea recibir toda la información de la propiedad y/o posibles llamados de atención a sus arrendatarios: </b>
                @if($residentData->lesseealert == 1)
                    Si
                @else
                    No
                @endif

                </p>
                @endif
            <hr>
            <br/>
            <br/>
            <h3>Información núcleo familiar</h3>
                <div class="justify-content-center" >
                        <div class="col-auto mt-5">
                        <div class="row">
                            <a style="margin:15px; float: left; background-color:#B74438 !important;" class="btn btn-danger" href="/habitants/create/{{$user->id}}">Crear habitante</a>
                        </div>
                        <table class="table table-bordered table-responsive justify-content-center dataTable" id="datatable" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Nombre</th>
                                    <th>Tipo de documento</th>
                                    <th>Número de documento</th>
                                    <th>Edad</th>
                                    <th>Ocupación</th>
                                    <th>Parentesco con el residente</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($habitants as $habitant)
                                <tr style="text-align: center;">
                                    <td>{{$habitant->name}}</td>
                                    <td>{{$habitant->document_type}}</td>
                                    <td>{{$habitant->document}}</td>
                                    <td>{{$habitant->age}} años</td>
                                    <td>{{$habitant->occupation}}</td>
                                    <td>{{$habitant->kinship}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a style="margin:3px; width:50%; color:white;"  class="btn btn-danger btn-block" href="/habitants/delete/{{$habitant->id}}" onclick="return confirm('¿Esta seguro que quiere borrar este habitante?')">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                </div>
                <hr>
                <br/>
                <br/>
                <h3>Información parqueaderos</h3>
                <div class="justify-content-center" >
                    <div class="col-auto mt-5">
                        <div class="row">
                            <a style="margin:15px; float: left; background-color:#B74438 !important;" class="btn btn-danger" href="/transports/create/{{$user->id}}">Añadir medio de transporte</a>
                        </div>
                        <table class="table table-bordered table-responsive justify-content-center" id="datatable1" >
                            <thead>
                            <tr style="text-align: center;">
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Color</th>
                                <th>Modelo</th>
                                <th>Placa</th>
                                <th>No. Parqueadero</th>
                                <th>Parqueadero propio</th>
                                <th>No. de Serie</th>
                                <th>No. Bicicletero</th>
                                <th>Periodo de uso bicicletero</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transports as $transport)
                                <tr style="text-align: center;">
                                    <td>
                                        @if($transport->type == 'motorcycle')
                                            Motocicleta
                                        @elseif ($transport->type == 'car')
                                            Carro
                                        @elseif($transport->type == 'bicycle')
                                            Bicicleta
                                        @endif
                                    </td>
                                    <td>
                                        @if($transport->brand == null)
                                            No aplica
                                        @else
                                            {{$transport->brand}}
                                        @endif
                                    </td>
                                    <td>{{$transport->color}}</td>
                                    <td>
                                        @if($transport->model == null)
                                            No aplica
                                        @else
                                            {{$transport->model}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($transport->plaque == null)
                                            No aplica
                                        @else
                                            {{strtoupper($transport->plaque)}}
                                        @endif

                                    </td>
                                    <td>
                                        @if($transport->parkingnum == null)
                                            No aplica
                                        @else
                                            {{$transport->parkingnum}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($transport->ownparking == null)
                                            No aplica
                                        @elseif($transport->ownparking == 'yes')
                                            Si
                                        @elseif($transport->ownparking == 'no')
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if($transport->numserie == null)
                                            No aplica
                                        @else
                                            {{$transport->numserie}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($transport->bicyclerack == null)
                                            No aplica
                                        @else
                                            {{$transport->bicyclerack}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($transport-> bicycleperiod == 0)
                                            No aplica
                                        @else
                                            {{$transport-> bicycleperiod}}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a style="margin:3px; width:50%; color:white;"  class="btn btn-danger btn-block" href="/transports/delete/{{$transport->id}}" onclick="return confirm('¿Esta seguro que quiere eliminar este medio de transporte?')">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <br/>
                <br/>
                <h3>Información mascotas</h3>
                <div class="justify-content-center" >
                    <div class="col-auto mt-5">
                        <div class="row">
                            <a style="margin:15px; float: left; background-color:#B74438 !important;" class="btn btn-danger" href="/pets/create/{{$user->id}}">Crear mascota</a>
                        </div>
                        <table class="table table-bordered table-responsive justify-content-center" id="datatable2" cellspacing="0">
                            <thead>
                            <tr style="text-align: center;">
                                <th>Nombre</th>
                                <th>Especie</th>
                                <th>Raza</th>
                                <th>Color</th>
                                <th>Edad</th>
                                <th>Poliza de seguro</th>
                                <th>Carnet de vacunas actualizado</th>
                                <th>Peligroso</th>
                                <th>Placa</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pets as $pet)
                                <tr style="text-align: center;">
                                    <td>{{$pet->name}}</td>
                                    <td>
                                        @if ($pet->species == 'dog')
                                            Perro
                                        @elseif ($pet->species == 'cat')
                                                Gato
                                        @else
                                            {{ $pet->species }}
                                        @endif
                                    </td>
                                    <td>{{$pet->race}}</td>
                                    <td>{{$pet->color}}</td>
                                    <td>{{$pet->age}} años</td>
                                    <td>{{$pet->policy}}</td>
                                    <td>
                                        @if ($pet->card == 1)
                                            Si
                                            @else
                                            No
                                        @endif


                                    </td>
                                    <td>
                                        @if ($pet->dangerous == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pet->plaque == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a style="margin:3px; width:50%; color:white;"  class="btn btn-danger btn-block" href="/pets/delete/{{$pet->id}}" onclick="return confirm('¿Esta seguro que quiere borrar esta mascota?')">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <br/>
                <br/>
                <h3>Información para facturación</h3>
                <br/>
                <br/>
                <p style="font-size: 16px"><b>Persona de contacto: </b> {{ $residentData->name_invoice }}</p>
                <p style="font-size: 16px"><b>Teléfono fijo / Teléfono celular: </b> {{$residentData->phone_invoice}}</p>
                <p style="font-size: 16px"><b>Dirección de notificaciones: </b> {{$residentData->address_invoice}}</p>
                <hr>
                <br/>
                <br/>
                <h3> Información inmobiliaria</h3>
                <br/>
                <br/>
                <p style="font-size: 16px"><b>Razón Social: </b> {{ $residentData->razon_realestate }}</p>
                <p style="font-size: 16px"><b>Nit: </b> {{$residentData->nit_realestate}}</p>
                <p style="font-size: 16px"><b>Nombre de contacto: </b> {{$residentData->name_realestate}}</p>
                <p style="font-size: 16px"><b>E-mail de contacto: </b> {{$residentData->email_realestate}}</p>
                <p style="font-size: 16px"><b>Teléfono: </b> {{$residentData->phone_realestate}}</p>
                <hr>
        </div>
            @else
                <h1><i>El residente no ha llenado el formulario</i></h1>
            @endif
        </div>
    </div>
@endsection
