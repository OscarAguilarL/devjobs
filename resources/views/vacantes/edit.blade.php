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
  <h1 class="text-2xl text-center mt-5">Editar Vacante: {{ $vacante->titulo }}</h1>

  <form
    action="{{ route('vacantes.update', ['vacante' => $vacante->id]) }}"
    method="POST"
    class="max-w-lg mx-auto my-10"
  >
    @csrf
    @method('PUT')

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
        value="{{ $vacante->titulo }}"
      >

      @error('titulo')
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
        for="categoria"
        class="block text-gray-700 text-sm mb-2"
      >Categoria:</label>

      <select
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
            {{ $vacante->categoria_id == $categoria->id ? 'selected' : '' }}
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
        for="experiencia"
        class="block text-gray-700 text-sm mb-2"
      >Experiencia:</label>

      <select
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
          <option
            {{ $vacante->experiencia_id == $experiencia->id ? 'selected' : '' }}
            value="{{ $experiencia->id }}"
          >
            {{ $experiencia->nombre }}
          </option>
        @endforeach
      </select>

      @error('experiencia')
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
      >Ubicaci??n:</label>

      <select
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
            {{ $vacante->ubicacion_id == $ubicacion->id ? 'selected' : '' }}
            value="{{ $ubicacion->id }}"
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

    <div class="mb-5">
      <label
        for="salario"
        class="block text-gray-700 text-sm mb-2"
      >Salario:</label>

      <select
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
          <option
            {{ $vacante->salario_id == $salario->id ? 'selected' : '' }}
            value="{{ $salario->id }}"
          >
            {{ $salario->nombre }}
          </option>
        @endforeach
      </select>
      @error('salario')
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
        for="descripcion"
        class="block text-gray-700 text-sm mb-2"
      >Descripci??n del puesto:</label>
      <div class="editable p-3 bg-gray-100 rounded form-input text-gray-700"></div>

      <input
        type="hidden"
        name="descripcion"
        id="descripcion"
        value="{!! $vacante->descripcion !!}"
      >
      @error('descripcion')
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
        for="imagen"
        class="block text-gray-700 text-sm mb-2"
      >Im??gen del puesto:</label>
      <div
        id="dropzoneDevJobs"
        class="dropzone rounded bg-gray-100"
      ></div>

      <input
        type="hidden"
        name="imagen"
        id="imagen"
        value="{{ $vacante->imagen }}"
      >

      @error('imagen')
        <div
          class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
          role="alert"
        >
          <span class="block">{{ $message }}</span>
        </div>
      @enderror
      <p id="error"></p>
    </div>

    <div class="mb-5">
      <label
        for="skills"
        class="block text-gray-700 text-sm mb-5"
      >Habilidades y conocimientos: <span class="text-xs">(elige al menos 3)</span></label>

      @php
        $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails'];
      @endphp

      <lista-skills
        :skills="{{ json_encode($skills) }}"
        :oldskills="{{ json_encode($vacante->skills) }}"
      ></lista-skills>
      @error('skills')
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
            'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist', 'h2', 'h3'
          ],
          static: true,
          sticky: true,
        },
        placeholder: {
          text: 'Informaci??n de la vacante...'
        }
      });

      // agrega al input hidden lo que el usuario escribe en medium editor
      editor.subscribe('editableInput', (eventObj, editable) => {
        const contenido = editor.getContent();
        document.querySelector('#descripcion').value = contenido;
      });

      // llena el editor con el contenido del input hidden
      editor.setContent(document.querySelector('#descripcion').value)

      // DropZone
      const dropzone = new Dropzone('#dropzoneDevJobs', {
        url: '/vacantes/imagen',
        dictDefaultMessage: 'Arrastra una im??gen',
        acceptedFiles: '.png,.jpg,.jpeg,.gif,.bpm',
        addRemoveLinks: true,
        dictRemoveFile: 'Eliminar archivo',
        maxFiles: 1,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
        },
        init: function() {
          if (document.querySelector('#imagen').value.trim()) {
            let imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('#imagen').value;
            imagenPublicada.nombreServidor = document.querySelector('#imagen').value

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success');
            imagenPublicada.previewElement.classList.add('dz-complete');
          }
        },
        success: function(file, resp) {
          console.log(resp.correcto);
          document.querySelector('#error').textContent = '';

          // coloca la resp en un input hidden
          document.querySelector('#imagen').value = resp.correcto

          // a??adir al objeto de archivo el nombre del servidor
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
              imagen: file.nombreServidor
            })
            .then(console.log)
        }
      });
    })
  </script>
@endsection
