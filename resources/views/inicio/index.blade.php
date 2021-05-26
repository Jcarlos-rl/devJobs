@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-white">
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-3xl text-gray-700">
                dev<span class="font-bold">Jobs</span>
            </p>
            <h1 class="mt-2 sm:mt-4 text-4xl font-bold text-gray-500 leading-tight">
                Encuentre un trabajo remoto o en su país
                <span class="text-gray-700 block">Para Desarrolladores / Diseñadores Web</span>
            </h1>

            <h2 class="my-10 text-2xl text-gray-700">Busca una vacante</h2>
            <form action="{{ route('vacantes.buscar') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>
                    <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="categoria" id="categoria">
                        <option disabled selected>Selecciona una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" {{ old('categoria') == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
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
                    <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>
                    <select class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-ligth focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="ubicacion" id="ubicacion">
                        <option disabled selected>Seleccione la ubicación</option>
                        @foreach ($ubicaciones as $ubicacion)
                            <option value="{{$ubicacion->id}}" {{ old('ubicacion') == $ubicacion->id ? 'selected' : ''}}>{{$ubicacion->nombre}}</option>
                        @endforeach
                    </select>

                    @error('ubicacion')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <button type="submit" class="bg-gray-700 w-full hover:bg-gray-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10">Buscar vacantes</button>
            </form>
        </div>
        <div class="lg:w-1/2 block">
            <img class="inset-0 h-full w-full object-cover" src="{{ asset('images/4321.jpg') }}" alt="devJobs">
        </div>
    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Nuevas
            <span class="font-bold">Vacantes</span>
        </h1>

        <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($vacantes as $vacante)
                <li class="p-10 border border-gray-300 bg-white shadow">
                    <h2 class="text-2xl font-bold text-gray-700">
                        {{ $vacante->titulo }}
                    </h2>
                    <a href="{{ route('categorias.show', $vacante->categoria_id) }}" class="block text-gray-700 font-normal my-2">
                        {{ $vacante->categoria->nombre }}
                    </a>
                    <p class="block text-gray-700 font-normal my-2">
                        Ubicación:
                        <span class="font-bold">
                            {{ $vacante->ubicacion->nombre }}
                        </span>
                    </p>
                    <p class="block text-gray-700 font-normal my-2">
                        Experiencia:
                        <span class="font-bold">
                            {{ $vacante->experiencia->nombre }}
                        </span>
                    </p>
                    <a class="bg-gray-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm" href="{{ route('vacantes.show', $vacante->id) }}">Ver vacante</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
