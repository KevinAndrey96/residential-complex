@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Información extra
        </div>
        <div class="card-body container-fluid">
            <form action="/extrainfo/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="resident_type">Tipo de residente: </label>
                    <select class="form-control" name="resident_type" id="resident_type">
                        <option value="Propietario">Propietario</option>
                        <option value="Arrendatario">Arrendatario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Número de residentes en el apartamento: </label>
                    <input class="form-control" type="number" name="quantity" id="quantity" min="1" required>
                </div>
                <h4>¿Que medio de transporte usa?</h4><p>Si no tiene ninguno de los medios de transporte aquí mencionados por favor saltarse este paso</p>
                <br/>
                <div class="form-group">
                    <input type="checkbox" name="moto" id="moto" onclick="showInput()">
                    <label for="moto">Motocicleta</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="carro" id="carro" onclick="showInput()">
                    <label for="carro">Automovil</label>
                </div>
                <div class="form-group" >
                    <input type="checkbox" name="carro" id="bicicleta" onclick="showInput()">
                    <label for="bicicleta">Bicicleta</label>
                </div>
                <div class="form-group"  id="divquantitymoto" style="display: none">
                    <label for="quantity-moto">¿Cuántas motocicletas tiene en el parqueadero?</label>
                    <input class="form-control" type="number" name="quantity_moto" id="quantity_moto" disabled="disabled" min="1" required>
                </div>
                <div class="form-group"  id="divquantitycarro" style="display: none">
                    <label for="quantity-carro">¿Cuántos automoviles tiene en el parqueadero?</label>
                    <input class="form-control" type="number" name="quantity_carro" id="quantity_carro" disabled="disabled" min="1" required>
                </div>
                <div class="form-group"  id="divquantitybici" style="display: none">
                    <label for="quantity-bici">¿Cúantas bicicletas tiene en el bicicletero?</label>
                    <input class="form-control" type="number" name="quantity_bici" id="quantity_bici" disabled="disabled" min="1" required>
                </div>

                <h4>¿Que tipo de mascota tiene?</h4><p>Si no tiene mascotas por favor saltarse este paso</p>
                <br/>
                <div class="form-group">
                    <input type="checkbox" name="perro" id="perro" onclick="showInput()">
                    <label for="perro">Perro</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="gato" id="gato" onclick="showInput()">
                    <label for="gato">Gato</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="otro" id="otro" onclick="showInput()">
                    <label for="otro">Otro</label>
                </div>
                <div class="form-group"  id="divquantityperro" style="display: none">
                    <label for="quantity-perro">¿Cuántos perros tiene en el apartamento?</label>
                    <input class="form-control" type="number" name="quantity_perro" id="quantity_perro" disabled="disabled" min="1"  required>
                </div>
                <div class="form-group"  id="divquantitygato" style="display: none">
                    <label for="quantity-gato">¿Cuántos gatos tiene en el apartamento?</label>
                    <input class="form-control" type="number" name="quantity_gato" id="quantity_gato" disabled="disabled" min="1"  required>
                </div>
                <div class="form-group"  id="divquantityotro" style="display: none">
                    <label for="quantity-otro">¿Cúantas mascotas no comunes tiene en el apartamento?</label>
                    <input class="form-control" type="number" name="quantity_otro" id="quantity_otro" disabled="disabled" min="1" required>
                </div>
                <input type="submit" style="background-color:#B74438 !important; float:right; padding:10px;" class="btn-danger" value="Siguiente">
            </form>
        </div>
    </div>

    <script>
        function showInput() {
            var moto = document.getElementById('moto');
            var carro = document.getElementById('carro');
            var bicicleta = document.getElementById('bicicleta');
            var divquantitymoto = document.getElementById('divquantitymoto');
            var divquantitybici = document.getElementById('divquantitybici');
            var divquantitycarro = document.getElementById('divquantitycarro');
            var quantymoto = document.getElementById('quantity_moto');
            var quantycarro = document.getElementById('quantity_carro');
            var quantybici = document.getElementById('quantity_bici');
            var perro = document.getElementById('perro');
            var gato = document.getElementById('gato');
            var otro = document.getElementById('otro');
            var divquantityperro = document.getElementById('divquantityperro');
            var divquantitygato = document.getElementById('divquantitygato');
            var divquantityotro = document.getElementById('divquantityotro');
            var quantyperro = document.getElementById('quantity_perro');
            var quantygato = document.getElementById('quantity_gato');
            var quantyotro = document.getElementById('quantity_otro');


            if (moto.checked == true) {
                divquantitymoto.style.display = 'block';
                quantymoto.disabled = false;
            } else {
                quantymoto.value = '';
                divquantitymoto.style.display = 'none';
                quantymoto.disabled = true;

            }

            if (carro.checked == true) {
                divquantitycarro.style.display = 'block';
                quantycarro.disabled = false;
            } else {
                divquantitycarro.style.display = 'none';
                quantycarro.disabled = true;
                quantycarro.value = '';
            }

            if (bicicleta.checked == true) {
                divquantitybici.style.display = 'block';
                quantybici.disabled = false;
            } else {
                quantybici.value = '';
                divquantitybici.style.display = 'none';
                quantybici.disabled = true;
            }

            if (perro.checked == true)
            {
                divquantityperro.style.display = 'block';
                quantyperro.disabled = false;
            } else {
                quantyperro.value = '';
                divquantityperro.style.display = 'none';
                quantyperro.disabled = true;
            }

            if (gato.checked == true) {
                divquantitygato.style.display = 'block';
                quantygato.disabled = false;
            } else {
                quantygato.value = '';
                divquantitygato.style.display = 'none';
                quantygato.disabled = true;
            }

            if (otro.checked == true) {
                divquantityotro.style.display = 'block';
                quantyotro.disabled = false;
            } else {
                quantyotro.value = '';
                divquantityotro.style.display = 'none';
                quantyotro.disabled = true;
            }
        }
    </script>

@endsection
