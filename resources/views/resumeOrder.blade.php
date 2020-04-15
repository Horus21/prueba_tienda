@extends('layouts/app')
@section('content')
    <h2>Resumen de la Orden </h2>
    <small>En esta seccion se muestra el detalle de la orden registrada.</small>

    <div class="card mx-auto shadow" style="width:90%;">
        <div class="card-header">
        <p class="text-center mb-0">Resumen de la orden </p>
        </div>
        <div class="card-body">
            <div class="bshow-bottom">
                <h5 class="text-center">Datos</h5>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$show->name}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="num_document">Numero Documento</label>
                        <input type="text" class="form-control" id="num_document" name="num_document" value="{{$show->document}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$show->email}}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$show->address}}" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile">Celular</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{$show->mobile}}" disabled>
                    </div>
                </div>
                <div class="border-bottom">
                    <h5 class="text-center">Opciones</h5>
                </div>
                </div>
                @if ($show->status !="PAYED")
                    <a href="{{route('jsorder',$show->id)}}" id="boton" class="btn btn-primary mb-4 btn-lg">Pagar</a>
                @endif
        </div>
    </div>
@endsection