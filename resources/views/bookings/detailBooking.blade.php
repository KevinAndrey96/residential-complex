@extends('layouts.dashboard')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('cancelSuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('cancelSuccess') }}
            </div>
        @endif
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('cancelFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('cancelFail') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            Reservaciones hechas
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div class="col-auto mt-5">
                    <div style="width: 100%; padding-left: -10px;">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="text-align: center; padding:10px;">Número de reserva</th>
                                    @hasanyrole('Administrator|Receptionist')
                                    <th style="text-align: center; padding:10px;">Residente</th>
                                    @endhasrole
                                    <th style="text-align: center; padding:10px;">Cantidad de personas</th>
                                    <th style="text-align: center; padding:10px;">Día</th>
                                    <th style="text-align: center; padding:10px;">Fecha</th>
                                    <th style="text-align: center; padding:10px;">Hora</th>
                                    <th style="text-align: center; padding:10px;">Estado</th>
                                    @hasrole('Resident')
                                    <th style="text-align: center; padding:10px;">Acción</th>
                                    @endhasrole
                                    @hasanyrole('Administrator|Receptionist')
                                    <th style="text-align: center; padding:10px;">Cambiar estado</th>
                                    @endhasrole

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td style="text-align: center; padding:10px;"> {{ $booking->id }}</td>
                                        @hasanyrole('Administrator|Receptionist')
                                        <td style="text-align: center; padding:10px;"> {{ $booking->user->name }}</td>
                                        @endhasrole
                                        <td style="text-align: center; padding:10px;">{{ $booking->quantity }}</td>
                                        <td style="text-align: center; padding:10px;">
                                            @if ($booking->day == 'monday')
                                                Lunes
                                            @elseif ($booking->day == 'tuesday')
                                                Martes
                                            @elseif ($booking->day == 'wednesday')
                                                Miércoles
                                            @elseif ($booking->day == 'thursday')
                                                Jueves
                                            @elseif ($booking->day == 'friday')
                                                Viernes
                                            @elseif ($booking->day == 'saturday')
                                                Sábado
                                            @elseif ($booking->day == 'sunday')
                                                Domingo
                                            @endif
                                        </td>
                                        <td style="text-align: center; padding:10px;">{{ $booking->date }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $booking->hour }}</td>
                                        <td style="text-align: center; padding:10px;">
                                            @if ($booking->state == 'Reservada')
                                                <p style="background-color:#51C70E; color:white; padding:5px; border-radius: 5px;">{{ $booking->state }}</p>
                                            @elseif ($booking->state == 'Tomada')
                                                <p style="background-color:#2084D8; color:white; padding:5px; border-radius: 5px;">{{ $booking->state }}</p>
                                            @elseif ($booking->state == 'Cancelada')
                                                <p style="background-color:#C70E0E; color:white; padding:5px; border-radius: 5px;">{{ $booking->state }}</p>
                                            @elseif ($booking->state == 'Perdida')
                                                <p style="background-color:#2D4152; color:white; padding:5px; border-radius: 5px;">{{ $booking->state }}</p>
                                            @elseif ($booking->state == 'En espera')
                                                <p style="background-color:#EFBD02; color:white; padding:5px; border-radius: 5px;">{{ $booking->state }}</p>
                                            @endif
                                        </td>
                                        @hasrole('Resident')
                                        <td>
                                            @if ($booking->state == 'Reservada')
                                            <center>
                                                <form method="post" action="/booking/cancel">
                                                    @csrf
                                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Esta seguro que quiere cancelar esta reservación?');" value="Cancelar">
                                                </form>
                                            </center>
                                            @endif
                                        </td>
                                        @endhasrole
                                        @hasanyrole('Administrator|Receptionist')
                                        <td style="text-align: center; padding:10px;">
                                            @if ( $booking->state == 'Reservada' || $booking->state == 'En espera' )
                                            <div style="margin:0px auto" class="">
                                            <select class="form-control-sm" name="state{{ $booking->id }}" id="state{{ $booking->id }}"  onchange="getState({{ $booking->id }})">
                                                <option value="Tomada" selected disabled></option>
                                                <option value="En espera">En espera</option>
                                                <option value="Tomada">Tomada</option>

                                            </select>
                                            </div>
                                                @endif
                                        </td>
                                        @endhasrole
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form method="post" action="/bookings/changeState" id="form-state">
                                @csrf
                                <input type="hidden" name="newState" id="newState">
                                <input type="hidden" name="bookingID" id="bookingID">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getState(id)
        {

            stateSelect = document.getElementById('state'+id);
            newState = document.getElementById('newState');
            bookingID = document.getElementById('bookingID');
            form = document.getElementById('form-state');
            newState.value = stateSelect.value;
            bookingID.value = id;
            form.submit();
            console.log(newState.value);

        }
    </script>



@endsection
