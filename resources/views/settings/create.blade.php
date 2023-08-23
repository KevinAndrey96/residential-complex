@extends('layouts.dashboard')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @if(Session::has('settingSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('settingSuccess') }}
        </div>
    @endif
</div>

<div class="card">
    <div class="card-header text-center">
        <h3 class="p-2">Crear Configuraciones</h3>
    </div>
    <div class="card-body">
        <form action="/setting/store" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name">Nombre del conjunto</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="num_tower">Numero de torres</label>
                    <input class="form-control" type="number" name="num_tower" id="num_tower"  min="1" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="num_int">Numero de interiores</label>
                    <input class="form-control" type="number" name="num_int" id="num_int"  min="1" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="num_apt">Numero de apartamentos</label>
                    <input class="form-control" type="number" name="num_apt" id="num_apt"  min="1" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="logo">Logo</label>
                    <input class="form-control" type="file" name="logo" id="logo"  min="1">
                </div>
                <div class="form-group col-md-6">
                    <label for="glossary">Glosario</label>
                    <textarea class="form-control" name="glossary" id="glossary"></textarea>
                </div>
                <div>
                    <input class="btn btn-success btn-round align-middle mt-4" style="width:100px;" type="submit" value="Agregar">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
