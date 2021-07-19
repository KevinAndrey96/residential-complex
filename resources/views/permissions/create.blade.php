@extends('layouts.dashboard')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('adminrecepSuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('adminrecepSuccess') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            Crear Permisos
        </div>
        <div class="card-body">
            <div class="row justify-content-center" >
                <div class="col-auto mt-5">
                    <form action="/permission/store" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name_permission">Nombre: </label>
                            <input class="form-control" type="text" name="name_permission" id="name_permission" required>
                        </div>
                        <input class="btn btn-secondary" style="width:300px, background-color:#B74438 !important; float:right" type="submit" value="Agregar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">


        var ids = new Array();

        function getIDS(permissionID)
        {
            var box = document.getElementById("customCheck"+permissionID);
            var cart = document.getElementById("cart");
            if (box.checked == true) {
                ids.push(permissionID);
            } else {
                var i = ids.indexOf(permissionID);
                if ( i !== -1 ) {
                    ids.splice( i, 1 );
                }

                //ids.pop(permissionID);
            }
            var selections = Object.assign({},ids);
            cart.value = ids;

        }


    </script>
@endsection
