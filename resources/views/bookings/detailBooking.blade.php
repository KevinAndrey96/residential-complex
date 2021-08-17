@extends('layouts.dashboard')
@section('content')

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
                                    @hasrole('Administrator')
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
                                    @hasrole('Administrator')
                                    <th style="text-align: center; padding:10px;">Cambiar estado</th>
                                    @endhasrole

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td style="text-align: center; padding:10px;"> {{ $booking->id }}</td>
                                        @hasrole('Administrator')''
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
                                        <td style="text-align: center; padding:10px;">{{ $booking->state }}</td>
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
                                        @hasrole('Administrator')
                                        <td style="text-align: center; padding:10px;">
                                            <div style="margin:0px auto" class="">
                                            <select class="form-control-sm" name="state" id="state" onchange="">
                                                <option value="Tomada">Tomada</option>
                                                <option value="Perdida">Perdida</option>
                                            </select>
                                            </div>
                                        </td>
                                        @endhasrole
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
@endsection
