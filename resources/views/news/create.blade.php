@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h3 class="p-2">Crear noticia</h3>
        </div>
        <div class="card-body">
            <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <p style="font-size: 20px;" class="font-weight-bold ms-2 mt-3">Título</p>
                        <input class="form-control" type="text" name="title" id="title" required>
                    </div>
                    <div class="form-group col-md-6">
                        <p style="font-size: 20px;" class="font-weight-bold ms-2 mt-3">Imagen</p>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                    <div class="form-group col-md-12">
                        <p style="font-size: 20px;" class="font-weight-bold ms-2 mt-3">Descripción</p>
                        <textarea class="form-control" name="description" id="richText" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4 d-flex justify-content-center">
                        <input type="submit" class="btn btn-success" value="Guardar" id="btn-show">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
