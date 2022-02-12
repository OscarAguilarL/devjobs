<h2 class="my-10 text-2xl text-gray-500">Buscar una vacante</h2>

<form action="{{ route('vacante.buscar') }}" method="POST">
  @csrf
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
        <option
          value="{{ $categoria->id }}"
          {{ old('categoria') == $categoria->id ? 'selected' : '' }}
        >
          {{ $categoria->nombre }}
        </option>
      @endforeach
    </select>

    @error('categoria')
      <div
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
        role="alert"
      >
        <span class="block">{{ $message }}</span>
      </div>
    @enderror

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
        <option
          value="{{ $ubicacion->id }}"
          {{ old('ubicacion') == $categoria->id ? 'selected' : '' }}
        >
          {{ $ubicacion->nombre }}
        </option>
      @endforeach
    </select>
    @error('ubicacion')
      <div
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
        role="alert"
      >
        <span class="block">{{ $message }}</span>
      </div>
    @enderror
  </div>

  <button
    type="submit"
    class="bg-teal-500 hover:bg-teal-600 text-gray-100 font-bold p-3
          focus:outline-none focus:shadow-outline uppercase mt-10 rounded"
  >Buscar vacantes</button>
</form>
