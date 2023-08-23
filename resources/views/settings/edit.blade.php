@extends('layouts.dashboard')
@section('content')
    @if(Session::has('settingSuccess'))
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="alert alert-success" role="alert">
                {{ Session::get('settingSuccess') }}
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Editar Configuraciones</h3>
        </div>
        <div class="card-body">
            <form action="/setting/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="name">Nombre del conjunto</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$setting->name}}"required >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="num_tower">Numero de torres</label>
                        <input class="form-control" type="number" name="num_tower" id="num_tower"  min="1" value="{{$setting->num_tower}}" required>
                    </div>
                    <!--
                    <div class="form-group col-md-4">
                        <label for="num_int">Numero de interiores</label>
                        <input class="form-control" type="number" name="num_int" id="num_int"  min="1" value="{{$setting->num_int}}" required>
                    </div>
                    -->
                    <div class="form-group col-md-4">
                        <label for="num_apt">Numero de apartamentos</label>
                        <input class="form-control" type="number" name="num_apt" id="num_apt"  min="1" value="{{$setting->num_apt}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="logo">Logo</label>
                        <input class="form-control" type="file" name="logo" id="logo"  min="1">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleColorInput" class="form-label">Color principal</label>
                        <input type="color" class="form-control form-control-color" id="exampleColorInput" name="principal_color" value="{{$setting->principal_color}}" title="Choose your color">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="second_color" class="form-label">Color secundario</label>
                        <input type="color" class="form-control form-control-color" id="exampleColorInput" name="second_color" value="{{$setting->second_color}}" title="Choose your color">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="third_color" class="form-label">Tercer color</label>
                        <input type="color" class="form-control form-control-color" id="exampleColorInput" name="third_color" value="{{$setting->third_color}}" title="Choose your color">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fourth_color" class="form-label">Cuarto color</label>
                        <input type="color" class="form-control form-control-color" id="exampleColorInput" name="fourth_color" value="{{$setting->fourth_color}}" title="Choose your color">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="glossary">Glosario</label>
                        <textarea class="form-control" name="glossary" id="glossary" >{{$setting->glossary}}</textarea>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="hidden" name="id" value="{{ $setting->id }}">
                        <input class="btn btn-success btn-round align-middle mt-4" style="width:100px;" type="submit" value="Modificar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
