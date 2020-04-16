@extends('layouts/app')
@section('content')

    <div class="card mx-auto shadow" style="width:90%;">
        <div class="card-header">
             @if(session('message'))
             <div class="alert alert-success">
               {{session('message')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                 <spam aria-hidden="true">&times</spam>
               </button>
             </div>
           @endif
        <p class="text-center mb-0">Nueva Orden</p>
        </div>

        <div class="card-body">
            <div class="border-bottom">
                <h5 class="text-center">Datos</h5>
            </div>
            <form action="{{route('create')}}" method="POST" class="my-4">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Example Daniel Plazas" value="{{old('name')}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="document">Numero Documento</label>
                        <input type="text" class="form-control" id="document" name="document" value="{{old('document')}}"  placeholder="123456789">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="example Calle Wallaby, 42, Sidney" value="{{old('address')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile">Celular</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="example 3001234567" value="{{old('mobile')}}">
                    </div>
                </div>
                <button type="submit"id="button" class="btn btn-primary float-right">Ordenar</button>
            </form>
        </div>
    </div>
@endsection