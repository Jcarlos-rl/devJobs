@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Categoría:
            <span class="font-bold">{{ $categoria->nombre }}</span>
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
