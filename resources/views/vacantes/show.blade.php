@extends('layouts.app')

@section('styles')
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css"
    integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
@endsection

@section('content')
  <h1 class="text-3xl text-center mt-10">{{ $vacante->titulo }}</h1>

  <div class="mt-10 mb-20 md:flex items-start">
    <div class="md:w-3/5">
      <p class="block text-gray-700 font-bold my-2">
        Publicado:
        <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
        por: <span class="font-normal">{{ $vacante->reclutador->name }}</span>
      </p>
      <p class="block text-gray-700 font-bold my-2">
        Categoría:
        <span class="font-normal">{{ $vacante->categoria->nombre }}</span>
      </p>
      <p class="block text-gray-700 font-bold my-2">
        Salario:
        <span class="font-normal">{{ $vacante->salario->nombre }}</span>
      </p>
      <p class="block text-gray-700 font-bold my-2">
        Ubicacion:
        <span class="font-normal">{{ $vacante->ubicacion->nombre }}</span>
      </p>
      <p class="block text-gray-700 font-bold my-2">
        Experiencia:
        <span class="font-normal">{{ $vacante->experiencia->nombre }}</span>
      </p>

      <h2 class="text-2xl text-center mt-10 mb-10 text-gray-700">Conocimientos y tecnologías</h2>
      @php
        $arraySkills = explode(',', $vacante->skills);
      @endphp
      @foreach ($arraySkills as $skill)
        <p class="inline-block border border-gray-500 rounded-lg py-2 px-8 text-gray-700 my-2">
          {{ $skill }}
        </p>
      @endforeach

      <a
        href="/storage/vacantes/{{ $vacante->imagen }}"
        data-lightbox="imagen"
        data-title="Vacante: {{ $vacante->titulo }}"
      >
        <img
          src="/storage/vacantes/{{ $vacante->imagen }}"
          alt="{{ $vacante->titulo }}"
          class="w-40 mt-10"
        >
      </a>


      <div class="descripcion mt-10 mb-5">
        {!! $vacante->descripcion !!}
      </div>
    </div>

    <aside class="md:w-2/5 bg-teal-500 p-5 rounded m-3">
      <h2 class="text-2xl my-3 text-white uppercase text-center">Contacta al reclutador</h2>

      <form action="">

      </form>
    </aside>
  </div>
@endsection