@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Información extra
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div class="col-auto mt-5">
                    <form method="post" action="extrainfo/store">
                        <h3>Información del {{ $firstdata->resident_type}}</h3>
                        <br/>
                        <div class="form-group">
                            <label for="name">Nombre o razón social: </label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="document_type">Tipo de documento: </label>
                            <select class="form-control" name="document_type" required>
                                <option value="CC">C.C.</option>
                                <option value="NIT">NIT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="document">Número de documento: </label>
                            <input class="form-control" type="number" name="document" id="document" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono fijo: </label>
                            <input class="form-control" type="number" name="phone" id="phone" min="1">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico para notificaciones: </label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono fijo: </label>
                            <input class="form-control" type="number" name="phone" id="phone" min="1">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Celular: </label>
                            <input class="form-control" type="number" name="mobile" id="mobile" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="job">Sector/Actividad Económica: </label>
                            <input class="form-control" type="text" name="job" id="job" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección adicional de notificaciones: </label>
                            <input class="form-control" type="text" name="address" id="address" required>
                        </div>
                        <div class="form-group">
                            <label for="depositnum">Número de depósito: </label>
                            <input class="form-control" type="number" name="depositnum" id="depositnum" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="cardnum">Número de tarjeta de acceso: </label>
                            <input class="form-control" type="number" name="cardnum" id="cardnum" min="1" required>
                        </div>

                        @if ($firstdata->resident_type == 'Propietario')
                        <div class="form-group">
                            <p style="font-size: 15px">¿Vive actualmente en la propiedad?</p>
                            <div>
                                <input type="radio" name="livein" id="liveinyes" value="yes" checked>
                                <label for="liveinyes">Si</label>
                            </div>
                            <div>
                                <input type="radio" name="livein" id="liveinno" value="no">
                                <label for="liveinno">No</label>
                            </div>
                        </div>
                            <div class="form-group">
                                <p style="font-size: 15px">
                                    ¿Desea recibir toda la información de la propiedad y/o
                                    posibles llamados de atención a sus arrendatarios (si aplica)?
                                </p>
                                <div>
                                    <input type="radio" name="lesseealert" id="lesseealert" value="yes" checked>
                                    <label for="lesseealert">Si</label>
                                </div>
                                <div>
                                    <input type="radio" name="lesseealert" id="lesseealert" value="no">
                                    <label for="lesseealert">No</label>
                                </div>
                            </div>

                        @endif
                        @if ($firstdata->resident_type == 'Arrendatario')
                            <div class="form-group">
                                <label for="dateadmission">Fecha de ingreso a la copropiedad: </label>
                                <input class="form-control" type="date" name="dateadmission" id="dateadmission" required>
                            </div>
                            <p style="font-size:12px; font-style: italic; color:red; text-align: justify;">
                                Recuerde que todos los arrendatarios deben cumplir con las obligaciones estipuladas en el  Manual de Convivencia, así mismo tener presente lineamientos de mudanzas y pagos respectivos. Capítulo 5-Numeral 5.11
                            </p>
                        @endif
                        <br/>
                        <h3>Información núcleo familiar</h3>
                        <br/>
                        @for($i=1; $i<=$firstdata->quantity; $i++)
                            <h5>Llene la información del habitante numero {{$i}} del apartamento</h5>
                            <br/>
                            <div class="form-group">
                                <label for="habitant_name">Nombre del residente: </label>
                                <input class="form-control" type="text" name="habitant_name" id="habitant_name" required>
                            </div>

                        @endfor
                        <input type="hidden" name="residenttype" value="{{$firstdata->resident_type}}">
                        <input style="background-color:#B74438 !important; float:right; padding:10px;" type="submit" class="btn btn-danger" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
