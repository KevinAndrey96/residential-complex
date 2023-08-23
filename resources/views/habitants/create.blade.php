@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="p-2 text-center">Crear habitante</h3>
        </div>
        <div class="card-body container-fluid">
            <form action="/habitants/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="habitant_name">Nombre</label>
                        <input class="form-control" type="text" name="habitant_name" id="habitant_name" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="habitant_birth">Fecha</label>
                        <input class="form-control" type="date" name="habitant_birth" id="habitant_birth" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="document_type">Tipo Doc.</label>
                        <select class="form-control" name="habitant_document_type" required>
                            <option value="CC">CC</option>
                            <option value="CE">CE</option>
                            <option value="RC">RC</option>
                            <option value="TI">TI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="document_number">No. Documento</label>
                        <input class="form-control" type="number" name="habitant_document_number" id="habitant_document_number" min="1" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="occupation">Ocupación</label>
                        <input class="form-control" type="text" name="habitant_occupation" id="habitant_occupation" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="relationship">Parentesco</label>
                        <input class="form-control" type="text" name="habitant_relationship" id="habitant_relationship" required>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="hidden" name="user_id" value={{$id}}>
                        <input style="padding: 10px 30px;" type="submit" class="btn btn-success btn-round" value="Guardar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
