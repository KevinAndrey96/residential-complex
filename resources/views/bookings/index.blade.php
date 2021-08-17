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
            @hasrole('Resident')
            Mis reservas
            @endhasrole
            @hasrole('Administrator')
            Reservas
            @endhasrole
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <p style="font-size: 20px">Seleccione un servicio:</p>
                <div class="col-auto mt-5">
                    <div style="width: 100%; padding-left: -10px;">
                        <div class="table-responsive">
                            <table id="datatable" class="table dt-responsive display nowrap" width="100%" cellspacing="0">

                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td style="text-align: center">
                                            <form method="post" action="/detailBooking">
                                                @csrf
                                                <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
                                                <input style="width:40%; padding: 15px; margin:0px; background-color:#B74438 !important;" type="submit" class="btn-danger" value="{{ $service->title }}">
                                            </form>
                                        </td>
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
