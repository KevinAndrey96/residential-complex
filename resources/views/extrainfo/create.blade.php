@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="p-2 text-center">Información del {{ $firstdata->resident_type}}</h3>
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div class="col-auto mt-2">
                    <form method="post" action="{{url('/extrainfo/store')}}">
                        @csrf
                      <div class="row">
                        <div class="form-group col-md-3">
                            <label for="name">Nombre o razón social</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="document_type">Tipo Doc.</label>
                            <select class="form-control" name="document_type" required>
                                <option value="CC">C.C.</option>
                                <option value="NIT">NIT</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="document">N° Documento</label>
                            <input class="form-control" type="number" name="document" id="document" min="1" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="email">Correo electrónico</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="phone">Teléfono fijo</label>
                            <input class="form-control" type="number" name="phone" id="phone" min="1">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="mobile">N° Celular</label>
                            <input class="form-control" type="number" name="mobile" id="mobile" min="1" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="job">Sector/Actividad Económica</label>
                            <input class="form-control" type="text" name="job" id="job" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="address">Dirección adicional</label>
                            <input class="form-control" type="text" name="address" id="address" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="depositnum">Número de depósito</label>
                            <input class="form-control" type="number" name="depositnum" id="depositnum" min="1" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cardnum">Número de tarjeta de acceso</label>
                            <input class="form-control" type="number" name="cardnum" id="cardnum" min="1" required>
                        </div>

                        @if ($firstdata->resident_type == 'Propietario')
                        <div class="form-group col-md-6 text-center">
                            <div class="text-center">
                                <p>¿Vive actualmente en la propiedad?</p>
                            </div>
                            <div>
                                <input type="radio" name="livein" id="liveinyes" value="true" checked>
                                <label for="liveinyes">Si</label>
                            </div>
                            <div>
                                <input type="radio" name="livein" id="liveinno" value="false">
                                <label for="liveinno">No</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6 text-center">
                            <div class="text-center">
                               <p>¿Desea recibir toda la información de la propiedad y/o
                                   posibles llamados de atención a sus arrendatarios (si aplica)?</p>
                            </div>
                            <div>
                              <input type="radio" name="lesseealert" id="lesseealert" value="true" checked>
                              <label for="lesseealert">Si</label>
                            </div>
                            <div>
                              <input type="radio" name="lesseealert" id="lesseealert" value="false">
                              <label for="lesseealert">No</label>
                            </div>
                        </div>

                        @endif
                        @if ($firstdata->resident_type == 'Arrendatario')
                            <div class="form-group col-md-3">
                                <label for="dateadmission">Fecha de ingreso a la copropiedad: </label>
                                <input class="form-control" type="date" name="dateadmission" id="dateadmission" required>
                            </div>
                            <div class="text-center text-danger col-md-12 ">
                               <p style="font-size:13px; font-style: italic;">
                                      Recuerde que todos los arrendatarios deben cumplir con las obligaciones estipuladas en el
                                      Manual de Convivencia, así mismo tener presente lineamientos de mudanzas y pagos respectivos.
                                      Capítulo 5-Numeral 5.11
                               </p>
                            </div>
                        @endif
                        <div class="text-center col-md-12 mb-2">
                            <h3>Información núcleo familiar</h3>
                        </div>
                          <div class="col-md-3"></div>
                        <div class="text-center text-danger col-md-6">
                            <p style="font-size:13px; font-style: italic;">
                                La presente información es solicitada con el fin de identificar los grupos poblacionales
                                (NNA- Adultos mayores-etc) dentro del Conjunto Residencial, complete la
                                información de integrantes del núcleo familiar que vivan en la propiedad.
                            </p>
                        </div>
                          <div class="col-md-3"></div>

                        @for($i=1; $i<=$firstdata->quantity; $i++)
                            <div class="text-center col-md-12 mb-4">
                               <h5>Información del habitante {{$i}} del apartamento</h5>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="habitant_name">Nombre del residente</label>
                                <input class="form-control" type="text" name="habitant_name[]" id="habitant_name" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="habitant_birth">Fecha de nacimiento</label>
                                <input class="form-control" type="date" name="habitant_birth[]" id="habitant_birth" required>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="document_type">Tipo Doc.</label>
                                <select class="form-control" name="habitant_document_type[]" required>
                                    <option value="CC">CC</option>
                                    <option value="CE">CE</option>
                                    <option value="RC">RC</option>
                                    <option value="TI">TI</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="document_number">N° Documento</label>
                                <input class="form-control" type="number" name="habitant_document_number[]" id="document_number" min="1" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="occupation">Ocupación</label>
                                <input class="form-control" type="text" name="habitant_occupation[]" id="occupation" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="relationship">Parentesco</label>
                                <input class="form-control" type="text" name="habitant_relationship[]" id="relationship" required>
                            </div>

                        @endfor
                        @if(isset($firstdata->quantity_moto) || isset($firstdata->quantity_carro) || isset($firstdata->quantity_bici))
                           <div class="text-center col-md-12 mb-4 mt-4">
                              <h3>Información parqueaderos</h3>
                           </div>
                        @endif
                        @if(isset($firstdata->quantity_moto))
                            <div style="display: none">{{ $quantity_moto = $firstdata->quantity_moto }}</div>
                        @for($i=1; $i<=$quantity_moto; $i++)
                            <div class="text-center text-danger col-md-12 mb-4 mt-4">
                                <h5>Información de la motocicleta {{$i}} </h5>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="brand">Marca</label>
                                <input class="form-control" type="text" name="brand[]" id="brand" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="plaque">Placa</label>
                                <input class="form-control" type="text" name="plaque[]" id="brand" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="color">Color</label>
                                <input class="form-control" type="text" name="color[]" id="color" required>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="model">Modelo</label>
                                <input class="form-control" type="text" name="model[]" id="model" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="parkingnum">N° parqueadero: </label>
                                <input class="form-control" type="text" name="parkingnum[]" id="model" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ownparking">¿El parqueadero es propio? </label>
                                <select class="form-control" name="ownparking[]" id="ownparking{{$i}}" onchange="owner({{$i}})" required>
                                    <option value="yes">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                                <div class="form-group col-md-4" id="divOwner{{$i}}" style="display: none">
                                    <label for="owner">Nombre del dueño del parqueadero </label>
                                    <input class="form-control" type="text" name="owner[]" id="owner{{$i}}">
                                </div>
                                <input type="hidden" name="numserie[]" value="">
                                <input type="hidden" name="bicyclerack[]" value="">
                                <input type="hidden" name="bicycleperiod[]" value="">
                                <input type="hidden" name="type[]" value="motorcycle">
                            @endfor
                        @else
                            <div style="display: none">{{ $quantity_moto = 0 }}</div>
                        @endif


                        @if(isset($firstdata->quantity_carro))
                            <div style="display: none">{{ $quantity_carro = $firstdata->quantity_carro }}</div>
                            @for($i=1; $i<=$quantity_carro; $i++)
                                <div class="text-center text-danger col-md-12 mb-4 mt-4">
                                    <h5>Información del carro {{$i}}</h5>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="brand">Marca</label>
                                    <input class="form-control" type="text" name="brand[]" id="brand" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="plaque">Placa</label>
                                    <input class="form-control" type="text" name="plaque[]" id="plaque" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="color">Color</label>
                                    <input class="form-control" type="text" name="color[]" id="color" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="model">Modelo</label>
                                    <input class="form-control" type="text" name="model[]" id="model" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="parkingnum">N° parqueadero</label>
                                    <input class="form-control" type="text" name="parkingnum[]" id="model" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ownparking">¿El parqueadero es propio? </label>
                                    <select class="form-control" name="ownparking[]" id="ownparking{{$i + $quantity_moto }}" onchange="owner({{$i + $quantity_moto}})" required>
                                        <option value="yes">Si</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4" id="divOwner{{$i + $quantity_moto}}" style="display: none">
                                    <label for="owner">Nombre del dueño del parqueadero </label>
                                    <input class="form-control" type="text" name="owner[]" id="owner{{$i + $quantity_moto}}">
                                </div>
                                <input type="hidden" name="bicyclerack[]" value="">
                                <input type="hidden" name="numserie[]" value="">
                                <input type="hidden" name="bicycleperiod[]" value="">
                                <input type="hidden" name="type[]" value="car">
                            @endfor
                            @else
                            <div style="display: none">{{$quantity_carro = 0}}</div>
                        @endif
                        @if(isset($firstdata->quantity_bici))
                            <div style="display: none">{{ $quantity_bici= $firstdata->quantity_bici }}</div>
                            @for($i=1; $i<=$quantity_bici; $i++)
                                <div class="text-center text-danger col-md-12 mb-4 mt-4">
                                    <h5>Información de la bicicleta {{$i}}</h5>
                                </div>
                                  <div class="col-md-2"></div>
                                <div class="form-group col-md-2">
                                    <label for="color">Color</label>
                                    <input class="form-control" type="text" name="color[]" id="color" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="numserie">N° de serie:</label>
                                    <input class="form-control" type="number" name="numserie[]" id="numserie" min="1" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="bicyclerack">N° bicicletero: </label>
                                    <input class="form-control" type="number" name="bicyclerack[]" id="bicyclerack" min="1" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="bicycleperiod">Uso mensual bicicletero</label>
                                    <input class="form-control" type="number" name="bicycleperiod[]" id="bicycleperiod" min="1" required>
                                </div>
                                <input type="hidden" name="brand[]" value="">
                                <input type="hidden" name="plaque[]" value="">
                                <input type="hidden" name="model[]" value="">
                                <input type="hidden" name="parkingnum[]" value="">
                                <input type="hidden" name="ownparking[]" value="">
                                <input type="hidden" name="owner[]" value="">
                                <input type="hidden" name="type[]" value="bicycle">
                            @endfor
                        @endif
                        @if(isset($firstdata->quantity_moto) || isset($firstdata->quantity_carro) || isset($firstdata->quantity_bici))
                              <div class="col-md-3"></div>
                              <div class="text-center text-danger col-md-6">
                                  <p style="font-size:13px; font-style: italic;">
                                      Recuerde respetar las líneas de demarcación de parqueo y el puesto que corresponde
                                      a cada vehículo, no parquear de forma temporal ni permanente vehículos en parqueaderos
                                      de visitantes, no parquear en zonas peatonales y demás obligaciones del Manual de
                                      Convivencia- Numeral 5.8
                                  </p>
                              </div>
                              <div class="col-md-3"></div>
                        @endif
                        @if(isset($firstdata->quantity_perro) || isset($firstdata->quantity_gato) || isset($firstdata->quantity_otro))
                           <div class="text-center col-md-12 mb-4 mt-4">
                               <h3>Información sobre mascotas</h3>
                           </div>
                        @endif
                        @if(isset($firstdata->quantity_perro))
                            <div style="display: none">{{ $quantity_perro= $firstdata->quantity_perro }}</div>
                            @for($i=1; $i<=$quantity_perro; $i++)
                              <div class="text-center text-danger col-md-12 mb-4 mt-4">
                                  <h5>Información del perro {{$i}}</h5>
                              </div>
                              <div class="form-group col-md-3">
                                  <label for="pet_name">Nombre</label>
                                  <input class="form-control" type="text" name="pet_name[]" id="pet_name" required>
                              </div>
                              <div class="form-group col-md-3">
                                   <label for="pet_race">Raza</label>
                                  <input class="form-control" type="text" name="pet_race[]" id="pet_race" required>
                              </div>
                              <div class="form-group col-md-2">
                                  <label for="pet_color">Color</label>
                                  <input class="form-control" type="text" name="pet_color[]" id="pet_color" required>
                              </div>
                              <div class="form-group col-md-1">
                                  <label for="pet_age">Edad</label>
                                  <input class="form-control" type="number" name="pet_age[]" id="pet_age" min="1" required>
                              </div>
                              <div class="form-group col-md-3">
                                  <label for="pet_policy">Poliza de seguro del perro</label>
                                  <input class="form-control" type="text" name="pet_policy[]" id="pet_policy">
                              </div>
                              <div class="form-group col-md-4 text-center">
                                  <p>¿El perro es potencialmente peligroso?</p>
                                  <div>
                                      <input type="radio" name="pet_dangerous{{$i}}" id="dangerous" value="true">
                                      <label for="dangerous">Si</label>
                                  </div>
                                  <div>
                                      <input type="radio" name="pet_dangerous{{$i}}" id="dangerous" value="false" checked>
                                      <label for="dangerous">No</label>
                                  </div>
                              </div>
                              <div class="form-group col-md-4 text-center">
                                  <p>¿Cuenta con carnet de vacunas actualizado?</p>
                                  <div>
                                        <input type="radio" name="pet_card{{$i}}" id="pet_card{{$i}}" value="true" checked>
                                        <label for="pet_card">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_card{{$i}}" id="pet_card{{$i}}" value="false" >
                                        <label for="pet_card">No</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 text-center">
                                    <p>¿Tiene placa con información del dueño?</p>
                                    <div>
                                        <input type="radio" name="pet_plaque{{$i}}" id="pet_plaque{{$i}}" value="true" checked>
                                        <label for="pet_plaque">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_plaque{{$i}}" id="pet_plaque{{$i}}" value="false" >
                                        <label for="pet_plaque">No</label>
                                    </div>
                                </div>
                                    <input type="hidden" name="pet_species[]" value="dog">
                            @endfor
                        @else
                            <div style="display: none">{{$quantity_perro = 0}}</div>
                        @endif
                        @if(isset($firstdata->quantity_gato))
                            <div style="display: none">{{ $quantity_gato= $firstdata->quantity_gato }}</div>
                            @for($i=1; $i<=$quantity_gato; $i++)
                                <div class="text-center text-danger col-md-12 mb-4 mt-4">
                                    <h5>Información del gato {{$i}}</h5>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pet_name">Nombre</label>
                                    <input class="form-control" type="text" name="pet_name[]" id="pet_name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pet_race">Raza</label>
                                    <input class="form-control" type="text" name="pet_race[]" id="pet_race" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pet_color">Color</label>
                                    <input class="form-control" type="text" name="pet_color[]" id="pet_color" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="pet_age">Edad</label>
                                    <input class="form-control" type="number" name="pet_age[]" id="pet_age" min="1" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pet_policy">Poliza de seguro del gato</label>
                                    <input class="form-control" type="text" name="pet_policy[]" id="pet_policy">
                                </div>
                                <div class="form-group col-md-4 text-center">
                                    <p>¿El gato es potencialmente peligroso?</p>
                                    <div>
                                        <input type="radio" name="pet_dangerous{{$i + $quantity_perro}}" id="dangerous{{$i + $quantity_perro}}" value="true">
                                        <label for="dangerous">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_dangerous{{$i + $quantity_perro}}" id="dangerous{{$i + $quantity_perro}}" value="false" checked>
                                        <label for="dangerous">No</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 text-center">
                                    <p>¿Cuenta con carnet de vacunas actualizado?</p>
                                    <div>
                                        <input type="radio" name="pet_card{{$i + $quantity_perro}}" id="pet_card{{$i + $quantity_perro}}" value="true" checked>
                                        <label for="pet_card">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_card{{$i + $quantity_perro}}" id="pet_card{{$i + $quantity_perro}}" value="false" >
                                        <label for="pet_card">No</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 text-center">
                                    <p>¿Tiene placa con información del dueño?</p>
                                    <div>
                                        <input type="radio" name="pet_plaque{{$i + $quantity_perro}}" id="pet_plaque{{$i + $quantity_perro}}" value="true" checked>
                                        <label for="pet_plaque">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_plaque{{$i + $quantity_perro}}" id="pet_plaque{{$i + $quantity_perro}}" value="false" >
                                        <label for="pet_plaque">No</label>
                                    </div>
                                </div>
                                <input type="hidden" name="pet_species[]" value="cat">
                            @endfor
                        @else
                            <div style="display: none">{{$quantity_gato = 0}}</div>
                        @endif
                        @if(isset($firstdata->quantity_otro))
                            <div style="display: none">{{ $quantity_otro= $firstdata->quantity_otro }}</div>
                            @for($i=1; $i<=$quantity_otro; $i++)
                                <div class="text-center text-danger col-md-12 mb-4 mt-4">
                                    <h5>Información de la mascota no común {{$i}}</h5>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pet_name">Nombre</label>
                                    <input class="form-control" type="text" name="pet_name[]" id="pet_name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pet_species">Especie</label>
                                    <input class="form-control" type="text" name="pet_species[]" id="pet_species" required>
                                </div>
                                    <input type="hidden" name="pet_race[]" id="pet_race" value="">
                                <div class="form-group col-md-2">
                                    <label for="pet_color">Color</label>
                                    <input class="form-control" type="text" name="pet_color[]" id="pet_color" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="pet_age">Edad</label>
                                    <input class="form-control" type="number" name="pet_age[]" id="pet_age" min="1" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pet_policy">Poliza de seguro</label>
                                    <input class="form-control" type="text" name="pet_policy[]" id="pet_policy">
                                </div>
                                <div class="form-group col-md-4 text-center">
                                    <p>¿Es potencialmente peligroso?</p>
                                    <div>
                                        <input type="radio" name="pet_dangerous{{$i + $quantity_perro + $quantity_gato}}" id="dangerous{{$i + $quantity_perro + $quantity_gato}}" value="true">
                                        <label for="pet_dangerous">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_dangerous{{$i + $quantity_perro + $quantity_gato}}" id="dangerous{{$i + $quantity_perro + $quantity_gato}}" value="false" checked>
                                        <label for="pet_dangerous">No</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 text-center">
                                    <p>¿Tiene carnet de vacunas actualizado?</p>
                                    <div>
                                        <input type="radio" name="pet_card{{$i + $quantity_perro + $quantity_gato}}" id="pet_card{{$i + $quantity_perro + $quantity_gato}}" value="true" checked>
                                        <label for="pet_card">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_card{{$i + $quantity_perro + $quantity_gato}}" id="pet_card{{$i + $quantity_perro + $quantity_gato}}" value="false" >
                                        <label for="pet_card">No</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 text-center">
                                    <p>¿Tiene placa con información del dueño?</p>
                                    <div>
                                        <input type="radio" name="pet_plaque{{$i + $quantity_perro + $quantity_gato}}" id="pet_plaque{{$i + $quantity_perro + $quantity_gato}}" value="true" checked>
                                        <label for="pet_plaque">Si</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pet_plaque{{$i + $quantity_perro + $quantity_gato}}" id="pet_plaque{{$i + $quantity_perro + $quantity_gato}}" value="false" >
                                        <label for="pet_plaque">No</label>
                                    </div>
                                </div>
                            @endfor
                        @endif
                        @if(isset($firstdata->quantity_perro) || isset($firstdata->quantity_gato) || isset($firstdata->quantity_otro))
                              <div class="col-md-3"></div>
                              <div class="text-center text-danger col-md-6">
                                  <p style="font-size:13px; font-style: italic;">
                                      Recuerde usar unicamente el parque de mascotas del conjunto,  recoger excrementos,
                                      tener carnet de vacuinas y placa de identificación con los datos respectivos, y demás
                                      obligaciones de la tenencia responsable de mascotas del Manual de
                                      Convivencia - Numeral 5,9.
                                  </p>
                              </div>
                        @endif
                          <div class="text-center col-md-12 mb-4 mt-4">
                              <h3>Información para convivencia</h3>
                          </div>
                        <div class="form-group col-md-6">
                            <p >¿Desea contribuir y/o participar en las campañas de sensibilización y comunicación comunitaria en:
                                Manejo basuras, Mascotas, Uso balcones y ventanas, Reciclaje, Control ruidos, Seguridad, Uso parqueaderos y Zonas comunes?</p>
                            <div>
                                <input type="radio" name="contribute" id="contributeyes" value="true" onclick="showinputcontribute()">
                                <label for="contribute">Si</label>
                            </div>
                            <div>
                                <input type="radio" name="contribute" id="contributeno" value="false" onclick="showinputcontribute()">
                                <label for="contribute">No</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <p>¿De que temas de convivencia le gustaría que se enviará mayor información a su correo
                                electrónico?
                            </p>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="checkbox" name="themes[]" id="themes" value="punishable_conduct">
                                    <label for="themes">Conductas sancionables</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="themes[]" id="themes" value="recycling">
                                    <label for="themes">Reciclaje</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" id="checkother" onclick="othertheme()">
                                    <label for="themes">Otro</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="checkbox" name="themes[]" id="themes" value="free_time">
                                    <label for="themes">Manejo tiempo libre</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="themes[]" id="themes" value="health">
                                    <label for="themes">Salud</label>
                                </div>
                            </div>
                            <div class="form-group" id="divother" style="display: none">
                                <label for="themes">¿Que tema propone?</label>
                                <input class="form-control" type="text" name="themes[]" id="other">
                            </div>
                        </div>
                        <div class="form-group col-md-6" id="divhowcontribute" style="display: none">
                            <label for="howcontribute">¿Cómo desea participar?</label>
                            <input class="form-control" type="text" name="howcontribute" id="howcontribute" required>
                        </div>
                        <div class="text-center col-md-12 mb-4 mt-4">
                            <h3>Información para facturación</h3>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name_invoice">Factura a nombre de</label>
                            <input class="form-control" type="text" name="name_invoice" id="name_invoice" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone_invoice">Teléfono fijo / celular</label>
                            <input class="form-control" type="number" name="phone_invoice" id="phone_invoice" min="0" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address_invoice">Dirección de notificaciones</label>
                            <input class="form-control" type="text" name="address_invoice" id="address_invoice" required>
                        </div>
                        <div class="text-center col-md-12 mb-4 mt-4">
                            <h3>Información inmobiliaria</h3>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="razon_realestate">Razón Social</label>
                            <input class="form-control" type="text" name="razon_realestate" id="razon_realestate">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nit_realestate">Nit</label>
                            <input class="form-control" type="number" name="nit_realestate" id="nit_realestate">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="name_realestate">Nombre de contacto</label>
                            <input class="form-control" type="text" name="name_realestate" id="name_realestate">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email_realestate">Correo electrónico</label>
                            <input class="form-control" type="email" name="email_realestate" id="email_realestate">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="phone_realestate">Teléfono</label>
                            <input class="form-control" type="number" name="phone_realestate" id="phone_realestate" min="0">
                        </div>
                          <div class="col-md-1"></div>
                        <div class="form-group col-md-10 mt-4">
                            <!--
                            <p style="font-size:10px; font-style: italic; color:black; text-align: justify;">
                                <b>AUTORIZACIÓN PARA TRATAMIENTO DE DATOS PERSONALES:</b> Autorizo de manera libre, voluntaria, previa,
                                explícita, informada e inequívoca a CONJUNTO RESIDENCIAL reservadetoscana P.H para que en los términos
                                legalmente establecidos realice la recolección, almacenamiento, uso, circulación, supresión y en general,
                                el tratamiento de los datos personales que he procedido a entregar o que entregaré, en virtud de las relaciones legales,
                                contractuales, comerciales y/o de cualquier otra que surja, en desarrollo y ejecución de los
                                fines descritos en el contrato suscrito. Dicha autorización, para adelantar el tratamiento de mis
                                datos personales, se extiende durante la totalidad del tiempo en el que pueda llegar a consolidarse un
                                vínculo o este persista por cualquier circunstancia con CONJUNTO RESIDENCIAL reservadetoscana P.H y con posterioridad al
                                finiquito del mismo, siempre que tal tratamiento se encuentre relacionado con las finalidades para
                                las cuales los datos personales, fueron inicialmente suministrados. En ese sentido, declaro conocer que los
                                datos personales objeto del tratamiento, serán utilizados específicamente para las finalidades establecidas en
                                la Política de Tratamiento de Datos del CONJUNTO RESIDENCIAL reservadetoscana P.H y que adicionalmente CONJUNTO
                                RESIDENCIAL reservadetoscana P.H podrán: Realizar las consultas, reportes y actualizaciones necesarias en diferentes
                                listas restrictivas y bancos de datos del comportamiento y crédito comercial, hábitos de pago, manejo
                                de las cuenta(s) bancaria(s) y en general el cumplimiento de las obligaciones pecuniarias.
                                De igual forma, declaro que me han sido informados y conozco los derechos que el ordenamiento legal y la
                                jurisprudencia, conceden al titular de los datos personales y que incluyen entre otras prerrogativas las que a
                                continuación se relacionan: -Conocer, actualizar y rectificar datos personales frente a los responsables o encargados del tratamiento;
                                este derecho se podrá ejercer, entre otros frente a datos parciales, inexactos, incompletos, fraccionados, que induzcan a error,
                                o aquellos cuyo tratamiento esté expresamente prohibido o no haya sido autorizado. -Ser informado por el responsable del tratamiento o el encargado del tratamiento,
                                previa solicitud, respecto del uso que le ha dado a mis datos personales. -Presentar ante la Superintendencia de Industria y Comercio quejas por infracciones al régimen de protección de datos personales.
                                -Revocar la autorización y/o solicitar la supresión del dato personal cuando en el tratamiento no se respeten los principios, derechos y garantías constitucionales y legales.
                                -Acceder en forma gratuita a mis datos personales que hayan sido objeto de Tratamiento. Finalmente, manifiesto conocer que en los casos en que requiera ejercer los derechos anteriormente mencionados,
                                la respectiva solicitud la puedo realizar a través de los mecanismos dispuestos para tal fin por el CONJUNTO RESIDENCIAL reservadetoscana P.H , mediante el correo reservadetoscanaph@gmail.com o correspondencia
                                a la dirección Av Cra 68 #5-17 en Bogotá D.C.
                            </p>
                            -->
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="hidden" name="residenttype" value="{{$firstdata->resident_type}}">
                            <input style="padding: 10px 30px;" type="submit" class="btn btn-success btn-round" value="Enviar">
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function owner(id)
        {
            var selectOwnParking = document.getElementById('ownparking'+id);
            var divInputOwner = document.getElementById('divOwner'+id);
            var inputOwner = document.getElementById('owner'+id);

            if(selectOwnParking.value == 'no')
            {
                divInputOwner.disabled = false;
                divInputOwner.style.display = "block";
                inputOwner.disabled = false;
            } else {
                divInputOwner.style.display = "none";
                divInputOwner.disabled = true;
                inputOwner.value = null;
                inputOwner.disabled = true;
            }
        }

        function showinputcontribute()
        {
            var divhowcontribute = document.getElementById('divhowcontribute');
            var inputHowContribute = document.getElementById('howcontribute');
            var radioContributeyes= document.getElementById('contributeyes');
            var radioContributeno= document.getElementById('contributeno');

            if(radioContributeyes.checked == true) {
                divhowcontribute.style.display = 'block';
                inputHowContribute.disabled = false;
            } else if(radioContributeno.checked == true) {
                divhowcontribute.style.display = 'none';
                inputHowContribute.value= null;
                inputHowContribute.disabled = true;
            }
        }

        function othertheme()
        {
            var divother = document.getElementById('divother');
            var inputother = document.getElementById('other');
            var checkother = document.getElementById('checkother');

            if (checkother.checked == true) {
                divother.style.display = 'block';
                inputother.disabled = false;
            } else {
                divother.style.display = 'none';
                inputother.value = '';
                //inputother.disabled = true;
            }
        }
    </script>


@endsection
