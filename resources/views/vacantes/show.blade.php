@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')
    <h1 class="text-3xl text-center mt-10">{{ $vacante->titulo }}</h1>
    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                Publicado: <spam class="font-normal">{{ $vacante->created_at->diffForHumans() }} por {{ $vacante->reclutador->name }}</spam>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoria: <spam class="font-normal">{{ $vacante->categoria->nombre }}</spam>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salario: <spam class="font-normal">{{ $vacante->salario->nombre }}</spam>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicación: <spam class="font-normal">{{ $vacante->ubicacion->nombre }}</spam>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <spam class="font-normal">{{ $vacante->experiencia->nombre }}</spam>
            </p>

            <h2 class="text-2xl text-center mt-10 text-gray-700 mb-6">Conocimientos y Tecnologías</h2>

            @php
                $arraySkills = explode(',', $vacante->skills);
            @endphp

            @foreach ($arraySkills as $skill)
                <p class="inline-block border border-gray-400 py-2 px-8 rounded  text-gray-700 my-2">
                    {{ $skill }}
                </p>
            @endforeach

            <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen">
                <img src="/storage/vacantes/{{$vacante->imagen}}" alt="" class="w-40 mt-10">
            </a>

            <div class="descipcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>
        </div>
        @if ($vacante->activa == 1)
            <div class="md:w-2/5 bg-gray-800 p-5 rounded m-3">
                <h2 class="text-2xl my-5 uppercase font-bold text-gray-100 text-center">Contacta al reclutador</h2>
                <form action="{{ route('candidatos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-100 text-sm font-bold mb-4">
                            Nombre:
                        </label>
                        <input type="text" id="nombre" class="p-3 bg-gray-100 rounder form-imput w-full @error('nombre') border dorder-red-500 @enderror" name="nombre" placeholder="Ingrese su nombre" value="{{ old('nombre')}}">

                        @error('nombre')
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-100 text-sm font-bold mb-4">
                            E-mail:
                        </label>
                        <input type="email" id="email" class="p-3 bg-gray-100 rounder form-imput w-full @error('email') border dorder-red-500 @enderror" name="email" placeholder="Ingrese su E-mail" value="{{ old('email')}}">

                        @error('email')
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="cv" class="block text-gray-100 text-sm font-bold mb-4">
                            Curriculum(PDF):
                        </label>
                        <input type="file" id="cv" class="p-3 bg-gray-100 rounder form-imput w-full @error('cv') border dorder-red-500 @enderror" name="cv" accept="application/pdf">

                        @error('cv')
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="vacante_id" value="{{ $vacante->id}}">

                    <input type="submit" class="bg-gray-300 w-full hover:bg-gray-400 text-gray-700 p-3 focus:outline-none focus:shadow-outline uppercase" value="Contactar">
                </form>
            </div>
        @endif
    </div>
@endsection
