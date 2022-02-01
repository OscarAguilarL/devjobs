@extends('layouts.app')

@section('styles')
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css"
    integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
@endsection

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
        @foreach ($categorias as $categoria)
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
        >-- SELECCIONA --</option>
        @foreach ($experiencias as $experiencia)
          <option value="{{ $experiencia->id }}">
            {{ $experiencia->nombre }}
          </option>
        @endforeach
      </select>

    </div>

    <div class="mb-5">
      <label
        for="ubicacion"
        class="block text-gray-700 text-sm mb-2"
      >Ubicación:</label>

      <select
        name="ubicacion"
        id="ubicacion"
        class="block appearance-none w-full
               border border-gray-200 text-gray-700 rounded leading-tight
               focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
      >
        <option
          disabled
          selected
        >-- SELECCIONA --</option>
        @foreach ($ubicaciones as $ubicacion)
          <option value="{{ $ubicacion->id }}">
            {{ $ubicacion->nombre }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-5">
      <label
        for="salario"
        class="block text-gray-700 text-sm mb-2"
      >Salario:</label>

      <select
        name="salario"
        id="salario"
        class="block appearance-none w-full
               border border-gray-200 text-gray-700 rounded leading-tight
               focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
      >
        <option
          disabled
          selected
        >-- SELECCIONA --</option>
        @foreach ($salarios as $salario)
          <option value="{{ $salario->id }}">
            {{ $salario->nombre }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-5">
      <label
        for="salario"
        class="block text-gray-700 text-sm mb-2"
      >Descripción del puesto:</label>
      <div class="editable"></div>
    </div>

    <button
      type="submit"
      class="bg-teal-500 hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline rounded-lg"
    >Publicar vacante</button>
  </form>
@endsection

@section('scripts')
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js"
    integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    defer
  ></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const editor = new MediumEditor('.editable');
    })
  </script>
@endsection
