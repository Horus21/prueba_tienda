@extends('layouts/app')
@section('content')
    <h2>Resumen de la Orden </h2>
    <small>En esta seccion se muestra el detalle de la orden registrada.</small>
    <br>
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
                        <input type="text" class="form-control"  name="name" value="{{$show->name}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="num_document">Numero Documento</label>
                        <input type="text" class="form-control"  name="num_document" value="{{$show->document}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control"  name="email" value="{{$show->email}}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control"  name="address" value="{{$show->address}}" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile">Celular</label>
                        <input type="text" class="form-control"  name="mobile" value="{{$show->mobile}}" disabled>
                    </div>
                     <div class="form-group col-md-2">
                        <label for="status">Estado Orden</label>
                        <input type="text" class="form-control"  name="mobile" value="{{$show->status}}" disabled>
                    </div>
                </div>

                </div>
                @if ($show->status !="PAYED")
                <div class="border-bottom">
                    <h5 class="text-center">Opciones</h5>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 text-center">
                            <br>
                             <a href="{{route('edit', $show->id)}}"><button class="btn btn-success ">Editar</button> </a>
                            <a href="{{route('jsonorder',$show->id)}}"><button class="btn btn-primary ">Pagar</button></a>
                        </div>
                    </div>


                @endif
        </div>
    </div>
@endsection