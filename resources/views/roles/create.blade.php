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
      Crear Roles
    </div>
    <div class="card-body">
        <div class="row justify-content-center" >
            <div class="col-auto mt-5">
                <form action="/role/store" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name_role">Nombre: </label>
                        <input class="form-control" type="text" name="name_role" id="name_role" required>
                    </div>
                    <table class="table-responsive justify-content-center text-center" id=""  cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align: center;">Permiso</th>
                                <th style="text-align: center;">Selección</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" id="customCheck{{ $permission->id }}" style="margin: 0px auto;" name="customCheck[]" value="{{ $permission->id }}" onclick="getIDS({{ $permission->id }})">
                                        <label class="form-check-label" for="customCheck[]"></label>
                                    </td>
                                </tr>


                            @endforeach


                        </tbody>
                    </table>
                    <input type="hidden" id="cart" name="cart">
                    <input class="btn btn-secondary" style="width:300px, background-color:#B74438 !important; float:right"type="submit" value="Agregar">
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