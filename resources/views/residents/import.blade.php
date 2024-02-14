@extends('layouts.dashboard')
@section('content')
    @if(Session::has('ResidentsImportSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('ResidentsImportSuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Importar Residentes</h3>
        </div>
        <div class="card-body">
            <form action="/residents-import" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label for="formFile" class="form-label">Seleccione el archivo excel para importar residentes</label>
                        <input class="form-control" type="file" name="residentsFile" id="residentsFile">
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        <input class="btn btn-success btn-round" style="width:100px;" type="submit" value="Importar">
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
