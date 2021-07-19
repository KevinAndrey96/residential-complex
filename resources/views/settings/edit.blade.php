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
        <div class="card-header">
            Editar Configuraciones
        </div>
        <div class="card-body">
            <form action="/setting/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Nombre del conjunto: </label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$setting->name}}"required >
                </div>
                <div class="form-group">
                    <label for="num_tower">Numero de torres: </label>
                    <input class="form-control" type="number" name="num_tower" id="num_tower"  min="1" value="{{$setting->num_tower}}" required>
                </div>
                <div class="form-group">
                    <label for="num_int">Numero de interiores: </label>
                    <input class="form-control" type="number" name="num_int" id="num_int"  min="1" value="{{$setting->num_int}}" required>
                </div>
                <div class="form-group">
                    <label for="num_apt">Numero de apartamentos: </label>
                    <input class="form-control" type="number" name="num_apt" id="num_apt"  min="1" value="{{$setting->num_apt}}" required>
                </div>
                <div class="form-group">
                    <label for="logo">Logo: </label>
                    <input class="form-control" type="file" name="logo" id="logo"  min="1">
                </div>
                <div class="form-group">
                    <label for="glossary">Glosario: </label>
                    <textarea class="form-control" name="glossary" id="glossary" >{{$setting->glossary}}</textarea>
                </div>
                <input type="hidden" name="id" value="{{ $setting->id }}">
                <input class="btn btn-secondary" style="width:100px; background-color:#B74438 !important; float:right" type="submit" value="Modificar">

            </form>
        </div>
    </div>

@endsection
