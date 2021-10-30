@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear habitante
        </div>
        <div class="card-body container-fluid">
            <form action="/habitants/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="habitant_name">Nombre del habitante: </label>
                    <input class="form-control" type="text" name="habitant_name" id="habitant_name" required>
                </div>
                <div class="form-group">
                    <label for="habitant_birth">Fecha de nacimiento: </label>
                    <input class="form-control" type="date" name="habitant_birth" id="habitant_birth" required>
                </div>
                <div class="form-group">
                    <label for="document_type">Tipo de documento: </label>
                    <select class="form-control" name="habitant_document_type" required>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        <option value="RC">RC</option>
                        <option value="TI">TI</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="document_number">No. Documento </label>
                    <input class="form-control" type="number" name="habitant_document_number" id="habitant_document_number" min="1" required>
                </div>
                <div class="form-group">
                    <label for="occupation">Ocupación: </label>
                    <input class="form-control" type="text" name="habitant_occupation" id="habitant_occupation" required>
                </div>
                <div class="form-group">
                    <label for="relationship">Parentesco con el propietario/arrendatario: </label>
                    <input class="form-control" type="text" name="habitant_relationship" id="habitant_relationship" required>
                </div>
                <input type="hidden" name="user_id" value={{$id}}>
                <input style="float:right; background-color:#B74438 !important;" type="submit" class="btn btn-danger" value="Guardar">

            </form>

        </div>
    </div>
@endsection
