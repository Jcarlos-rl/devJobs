@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form action="" class="max-w-lg mx-auto my-10">
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante:</label>
            <input id="titulo" type="text" class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo">
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="categoria" id="categoria">
                <option disabled selected>Selecciona una categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="experiencia" id="experiencia">
                <option disabled selected>Seleccione la experiencia</option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="ubicacion" id="ubicacion">
                <option disabled selected>Seleccione la ubicación</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>
            <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="salario" id="salario">
                <option disabled selected>Seleccione el salario</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripción del Puesto:</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700">
            </div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Imagen vacante:</label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100">
            </div>
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
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
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

            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen"
            })

        })
    </script>
@endsection
