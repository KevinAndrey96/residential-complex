@extends('layouts.dashboard')
@section('content')
    @if(Session::has('residentSuccess'))
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="alert alert-success" role="alert">
                {{ Session::get('residentSuccess') }}
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Registrar pago de administración</h3>
        </div>
        <div class="card-body">
            <form action="{{route('payments.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row justify-content-center">
                    <div class="form-group col-md-3">
                        <label for="name">Fecha</label>
                        <input class="form-control" type="date" name="date" id="date" required>
                    </div>
                    <div class="col-md-3 form-group d-flex justify-content-center mt-4">
                        <select class="my-select" id="userIDS" name="userID" aria-label="multiple select example" data-live-search="true" data-header="Apartamento" data-actions-box="true">
                            @foreach ($residents as $resident)
                                <option value="{{$resident->id}}">Torre {{$resident->resident->tower}} Apto {{$resident->resident->apt}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4 d-flex justify-content-center">
                        <input type="submit" class="btn btn-success" value="Registrar" id="btn-show">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
