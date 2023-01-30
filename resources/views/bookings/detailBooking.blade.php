@extends('layouts.dashboard')
@section('content')
        @if(Session::has('cancelSuccess'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-success" role="alert">
                    {{ Session::get('cancelSuccess') }}
                </div>
            </div>
        @endif
        @if(Session::has('cancelFail'))
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('cancelFail') }}
                </div>
            </div>
        @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Reservas realizadas</h3>
            <!--
            <a style=" border-radius: 50px;" class="btn btn-outline-success" href="/updateBookingStates">Actualizar estados</a>
            -->
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div class="col-auto mt-2">
                    <div>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style=" padding:10px;" class="text-center text-md-center align-middle">Número de reserva</th>
                                    @hasanyrole('Administrator|Receptionist')
                                    <th style=" padding: 10px 30px" class="text-center text-md-center align-middle">Residente</th>
                                    @endhasrole
                                    <th style=" padding: 10px 30px" class="text-center text-md-center align-middle">N° Personas</th>
                                    <th style=" padding: 10px 30px" class="text-center text-md-center align-middle">Día</th>
                                    <th style=" padding: 10px 30px" class="text-center text-md-center align-middle">Fecha</th>
                                    <th style=" padding: 10px 30px" class="text-center text-md-center align-middle">Hora</th>
                                    <th style=" padding: 10px 30px" class="text-center text-md-center align-middle">Estado</th>
                                    @hasrole('Resident')
                                    <th style=" padding: 10px 20px" class="text-center text-md-center align-middle">Cancelar</th>
                                    @endhasrole
                                    @hasanyrole('Administrator|Receptionist')
                                    <th style=" padding: 10px 30px" class="text-center text-md-center align-middle">Cambiar estado</th>
                                    @endhasrole
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td class="text-center text-md-center align-middle"> {{ $booking->id }}</td>
                                        @hasanyrole('Administrator|Receptionist')
                                        <td class="text-center text-md-center align-middle">
                                            @if (isset($booking->user->name))
                                                {{ $booking->user->name }}
                                            @endif
                                        </td>
                                        @endhasrole
                                        <td class="text-center text-md-center align-middle">{{ $booking->quantity }}</td>
                                        <td class="text-center text-md-center align-middle">
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
                                        <td class="text-center text-md-center align-middle">{{ $booking->date }}</td>
                                        <td class="text-center text-md-center align-middle">{{ $booking->hour }}</td>
                                        <td class="text-center text-md-center align-middle">
                                            @if ($booking->state == 'Reservada')
                                                <span style="color:green;" class="material-symbols-outlined" style="margin-top: 20px;">check_circle</span>
                                                <p style="color:green; margin-top: -8px;">Reservado</p>
                                            @elseif ($booking->state == 'Tomada')
                                                <span style="color:royalblue;" class="material-symbols-outlined" style="margin-top: 20px;">do_not_disturb_on</span>
                                                <p style="color:royalblue;margin-top:-8px;">Tomada</p>
                                            @elseif ($booking->state == 'Cancelada')
                                                <span style="color:red;" class="material-symbols-outlined" style="margin-top: 20px;">close</span>
                                                <p style="color:red;margin-top:-8px;">Cancelada</p>
                                            @elseif ($booking->state == 'Perdida')
                                                <span style="color:darkred;" class="material-symbols-outlined" style="margin-top: 20px;">Block</span>
                                                <p style="color:darkred;margin-top:-8px;">Perdida</p>
                                            @elseif ($booking->state == 'En espera')
                                                <span style="color:darkblue;" class="material-symbols-outlined" style="margin-top: 20px;">Refresh</span>
                                                <p style="color:darkblue;margin-top:-8px;">En espera</p>
                                            @endif
                                        </td>
                                        @hasrole('Resident')
                                        <td class="text-center text-md-center align-middle">
                                            @if ($booking->state == 'Reservada')
                                            <center>
                                                <form method="post" action="/booking/cancel">
                                                    @csrf
                                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                    <button style="border-radius: 50px;" type="submit" value="Cancelar" class="btn btn-link"
                                                            onclick="return confirm('¿Esta seguro que quiere cancelar esta reservación?');">
                                                        <span style="color: red" class="material-symbols-outlined" >delete</span>
                                                    </button>
                                                </form>
                                            </center>
                                            @endif
                                        </td>
                                        @endhasrole
                                        @hasanyrole('Administrator|Receptionist')
                                        <td s class="text-center text-md-center align-middle">
                                            @if ( $booking->state == 'Reservada' || $booking->state == 'En espera' )
                                            <div class="">
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
        setTimeout("location.reload()", 30000);
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
