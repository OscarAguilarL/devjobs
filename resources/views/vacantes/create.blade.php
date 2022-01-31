@extends('layouts.app')

@section('navegacion')
  @include('ui.adminnav')
@endsection

@section('content')
  <h1 class="text-2xl text-center mt-5">Nueva Vacante</h1>

  <form class="max-w-lg mx-auto my-10">
    <div class="mb-5">
      <label
        for="titulo"
        class="block text-gray-700 text-sm mb-2"
      >Titulo de la vacante:</label>
      <input
        id="titulo"
        type="text"
        class="p-3 bg-gray-100 rounded-sm form-input w-full @error('titulo') border-red-500 border @enderror"
        name="titulo"
        value="{{ old('titulo') }}"
      >
    </div>

    <div class="mb-5">
      <label
        for="categoria"
        class="block text-gray-700 text-sm mb-2"
      >Categoria:</label>

      <select
        name="categoria"
        id="categoria"
        class="block appearance-none w-full
               border border-gray-200 text-gray-700 rounded leading-tight
               focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
      >
        <option
          disabled
          selected
        >-- SELECCIONA UNA CATEGORIA --</option>
        @foreach($categorias as $categoria)
          <option value="{{ $categoria->id }}">
            {{ $categoria->nombre }}
          </option>
        @endforeach
      </select>

    </div>

    <div class="mb-5">
      <label
        for="experiencia"
        class="block text-gray-700 text-sm mb-2"
      >Experiencia:</label>

      <select
        name="experiencia"
        id="experiencia"
        class="block appearance-none w-full
               border border-gray-200 text-gray-700 rounded leading-tight
               focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
      >
        <option
          disabled
          selected
        >-- SELECCIONA UNA CATEGORIA --</option>
        @foreach($experiencias as $experiencia)
          <option value="{{ $experiencia->id }}">
            {{ $experiencia->nombre }}
          </option>
        @endforeach
      </select>

    </div>

    <button
      type="submit"
      class="bg-teal-500 hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline rounded-lg"
    >Publicar vacante</button>
  </form>
@endsection
