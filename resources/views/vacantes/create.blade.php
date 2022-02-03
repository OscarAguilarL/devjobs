@extends('layouts.app')

@section('styles')
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css"
    integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css"
    integrity="sha256-NkyhTCRnLQ7iMv7F3TQWjVq25kLnjhbKEVPqGJBcCUg="
    crossorigin="anonymous"
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
      <div class="editable p-3 bg-gray-100 rounded form-input text-gray-700"></div>

      <input
        type="hidden"
        name="descripcion"
        id="descripcion"
      >
    </div>

    <div class="mb-5">
      <label
        for="imagen"
        class="block text-gray-700 text-sm mb-2"
      >Imágen del puesto:</label>
      <div
        id="dropzoneDevJobs"
        class="dropzone rounded bg-gray-100"
      ></div>

      <input
        type="hidden"
        name="imagen"
        id="imagen"
      >

      <p id="error"></p>
    </div>

    <div class="mb-5">
      <label
        for="skills"
        class="block text-gray-700 text-sm mb-2"
      >Habilidades y conocimientos:</label>

      @php
        $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails'];
      @endphp

      <lista-skills :skills="{{ json_encode($skills) }}"></lista-skills>
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
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"
    integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY="
    crossorigin="anonymous"
  ></script>

  <script>
    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded', () => {
      // MediumEditor
      const editor = new MediumEditor('.editable', {
        toolbar: {
          buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter',
            'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'
          ],
          static: true,
          sticky: true,
        },
        placeholder: {
          text: 'Información de la vacante...'
        }
      });
      editor.subscribe('editableInput', (eventObj, editable) => {
        const contenido = editor.getContent();
        document.querySelector('#descripcion').value = contenido;
      });

      // DropZone
      const dropzone = new Dropzone('#dropzoneDevJobs', {
        url: '/vacantes/imagen',
        dictDefaultMessage: 'Arrastra una imágen',
        acceptedFiles: '.png,.jpg,.jpeg,.gif,.bpm',
        addRemoveLinks: true,
        dictRemoveFile: 'Eliminar archivo',
        maxFiles: 1,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
        },
        success: function(file, resp) {
          console.log(resp.correcto);
          document.querySelector('#error').textContent = '';

          // coloca la resp en un input hidden
          document.querySelector('#imagen').value = resp.correcto

          // añadir al objeto de archivo el nombre del servidor
          file.nombreServidor = resp.correcto;
        },
        maxfilesexceeded: function(file) {
          if (this.files[1] !== null) {
            this.removeFile(this.files[0]); // eliminar el archivo anterior
            this.addFile(file); // Agregar el nuevo archivo
          }
        },
        removedfile: function(file, response) {
          file.previewElement.parentNode.removeChild(file.previewElement)
          axios
            .post('/vacantes/borrarimagen', {
              imagen: file.nombreServidor,
            })
            .then(console.log)
        }
      });
    })
  </script>
@endsection
