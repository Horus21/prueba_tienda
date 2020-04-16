@extends('layouts/app')

@section('content')

  <div class="container">
           <h2>Lista de Ordenes Registradas </h2>
           <small>En esta seccion se listan todas las ordenes registradas.</small>
           @if(session('message'))
             <div class="alert alert-success">
               {{session('message')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                 <spam aria-hidden="true">&times</spam>
               </button>
             </div>
           @endif

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" id="list">ID</th>
            <th scope="col" id="list">Nombre</th>
            <th scope="col" id="list">Email</th>
            <th scope="col" id="list">Telefono</th>
            <th scope="col" id="list">Direccion</th>
            <th scope="col" id="list">Estado</th>
            <th scope="col" id="list">Fecha de creacion</th>
            <th scope="col" id="list">Opciones</th>

          </tr>
        </thead>
        <tbody>
        	@foreach($list as $item)
      	    <tr>
      	      <th scope="row">{{$item->id}}</th>
      	      <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->mobile}}</td>
              <td>{{$item->address}}</td>
              <td>{{$item->status}}</td>
              <td>{{$item->created_at}}</td>

              <td>

                <form action="{{route('destroy', $item)}}"method="POST">
                  <a href="{{route('show', $item)}}" ><button type="button" class="btn btn-primary">Resumen Orden</button></a>
                  <a href="{{route('edit', $item)}}"><button type="button" class="btn btn-success">Editar</button></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
      	    </tr>
      	  @endforeach
        </tbody>
    </table>
    <div class="row">
      <div class="mx-auto">
        {{$list->links()}}
        </div>
    </div>
  </div>
@endsection