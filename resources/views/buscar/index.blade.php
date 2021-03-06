@extends('layouts.app')

@section('navegacion')
  @include('ui.categoriasnav')
@endsection

@section('content')

  @if (count($vacantes) > 0)
    <div class="my-10 bg-gray-100 p-10 shadow">
      <h1 class="text-3xl text-gray-700 m-0">
        Resultados de la busqueda
      </h1>

      @include('ui.listadovacantes')
    </div>
  @else
    <p>No se encontraron vacantes relacionadas con la busqueda</p>
  @endif

@endsection
