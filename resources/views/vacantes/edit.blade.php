@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Editar Vacante {{ $vacante->titulo }}</h1>

    <form action="{{ route('vacantes.update', $vacante->id) }}" method="POST" class="max-w-lg mx-auto my-10">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante:</label>
            <input id="titulo" type="text" class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') border border-red-400 @enderror" name="titulo" value="{{ $vacante->titulo }}">

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="categoria" id="categoria">
                <option disabled selected>Selecciona una categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{ $vacante->categoria_id == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                @endforeach
            </select>

            @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="experiencia" id="experiencia">
                <option disabled selected>Seleccione la experiencia</option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{$experiencia->id}}" {{ $vacante->experiencia_id == $experiencia->id ? 'selected' : ''}}>{{$experiencia->nombre}}</option>
                @endforeach
            </select>

            @error('experiencia')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="ubicacion" id="ubicacion">
                <option disabled selected>Seleccione la ubicación</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{$ubicacion->id}}" {{ $vacante->ubicacion_id == $ubicacion->id ? 'selected' : ''}}>{{$ubicacion->nombre}}</option>
                @endforeach
            </select>

            @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="salario" id="salario">
                <option disabled selected>Seleccione el salario</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}" {{ $vacante->salario_id == $salario->id ? 'selected' : ''}}>{{$salario->nombre}}</option>
                @endforeach
            </select>

            @error('salario')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripción del Puesto:</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700">
            </div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{ $vacante->descripcion }}">

            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5 text-center">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Imagen vacante:</label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100 mb-3">
            </div>
            <span id="errorImage" class="text-red-500"></span>
            <input type="hidden" name="imagen" id="imagen" value="{{ $vacante->imagen }}">

            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="skills" class="block text-gray-700 text-sm mb-2">Habilidades y conocimientos:</label>
            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp
            <lista-skills
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode($vacante->skills) }}"
            ></lista-skills>

            @error('skills')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <button type="submit" class="bg-gray-800 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase mb-3">
            Publicar Vacante
        </button>
    </form>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', ()=>{
            const editor = new MediumEditor('.editable', {
                toolbar:{
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            });

            editor.subscribe('editableInput', function(e,edit){
                const contenido = editor.getContent();
                document.getElementById('descripcion').value = contenido;
            })

            editor.setContent( document.getElementById('descripcion').value);

            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Caga tu archivo',
                acceptedFiles: '.png,.jpg,.jpeg,.gif,.bmp',
                addRemoveLinks: true,
                maxFiles: 1,
                dictRemoveFile: 'Eliminar archivo',
                headers: {
                    'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content
                },
                init: function(){
                    if(document.getElementById('imagen').value.trim()){
                        let imgPublic = {};
                        imgPublic.size = 1234;
                        imgPublic.name = document.getElementById('imagen').value;

                        this.options.addedfile.call(this, imgPublic);
                        this.options.thumbnail.call(this, imgPublic, `/storage/vacantes/${imgPublic.name}`);

                        imgPublic.previewElement.classList.add('dz-success');
                        imgPublic.previewElement.classList.add('dz-complete');
                    }
                },
                success: function(file,resp){
                    document.getElementById('errorImage').innerText = '';
                    document.getElementById('imagen').value = resp.correcto;

                    file.nombreServidor = resp.correcto;
                },
                maxfilesexceeded: function(file){
                    console.log(this.files);
                    if(this.files[1] != null){
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                removedfile: function(file,resp){
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        imagen: file.nombreServidor ?? document.getElementById('imagen').value
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then(res => console.log(res))
                }
            })
        })
    </script>
@endsection
