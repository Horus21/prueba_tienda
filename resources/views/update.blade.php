@extends('layouts/app')
@section('content')

    <div class="card mx-auto shadow" style="width:90%;">
        <div class="card-header">
        <p class="text-center mb-0">Nueva Orden</p>
        </div>

        <div class="card-body">
            <div class="border-bottom">
                <h5 class="text-center">Datos</h5>
            </div>
            <form action="{{url('update',$list ?? ''->id)}}" method="POST" class="my-4">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Daniel Plazas" value="{{$list ?? ''->name}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="document">Numero Documento</label>
                        <input type="text" class="form-control" id="document" name="document" value="{{$list ?? ''->document}}"  placeholder="123456789">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@correo.com"value="{{$list ?? ''->email}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Calle Wallaby, 42, Sidney" value="{{$list ?? ''->address}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile">Celular</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="3001234567" value="{{$list ?? ''->mobile}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Actualizar</button>
            </form>
        </div>
    </div>
@endsection