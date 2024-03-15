@extends('layouts.dashboard')
@section('content')
    @if(Session::has('successNewsStore'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successNewsStore') }}
        </div>
    @endif
    @if(Session::has('successNewsUpdate'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successNewsUpdate') }}
        </div>
    @endif
    @if(Session::has('successNewsDelete'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successNewsDelete') }}
        </div>
    @endif
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-success shadow-primary border-radius-lg pt-1 pb-0">
                        <h6 class="text-white text-center text-capitalize my-2">
                            Noticias <a href="{{route('news.create')}}" id="btn-add" class="btn" ><i style="color: white;" class="material-icons opacity-10 p-0">add</i></a>
                        </h6>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap"
                                                   width="100%" cellspacing="0">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Título</th>
                                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Fecha</th>
                                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Imagen</th>
                                                    <th style="padding:10px;" class="text-center text-md-center align-middle">Acción</th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center text-md-center align-middle">
                                                    @foreach ($news as $value)
                                                        <tr style="padding:10px;" class="text-center text-md-center align-middle">
                                                            <td>{{$value->title}}</td>
                                                            <td>{{$value->created_at}}</td>
                                                            <td>
                                                                <a class="service" href="{{ getenv('APP_URL').$value->url_image }}">
                                                                    <img width="100px" class="avatar avatar-sm rounded" src="{{ getenv('APP_URL').$value->url_image }}" alt="No carga">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a style="color: darkgreen;" href="{{route('news.edit', ['id' => $value->id])}}" title="Editar" class="btn btn-link px-0 mb-0"><i style="color: darkgreen;  font-size: 25px !important;" class="material-icons opacity-10">edit</i></a>
                                                                <a style="color: darkred;" href="{{route('news.delete', ['id' => $value->id])}}"
                                                                   title="Eliminar" class="btn btn-link px-0 mb-0"
                                                                   onclick="return confirm('¿Está seguro que quiere eliminar este producto?')">
                                                                    <i style="color: darkred; font-size: 25px !important;"
                                                                       class="material-icons opacity-10">delete</i></a></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
