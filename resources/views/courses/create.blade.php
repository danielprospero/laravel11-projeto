@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Cadastrar o cursos</h2>
 
    <a href="{{ route('course.index') }}">
        <button>Voltar</button>
    </a> <br>

    <x-alert/>  

    <form action="{{ route('course.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome do curso" value="{{ old('name') }}" >
        @error('name')
            {{ $message }}
        @enderror
        <input type="text" name="price" placeholder="Preço do curso" value="{{ old('price') }}" >
        @error('price')
            {{ $message }}
        @enderror
        <button type="submit">Cadastrar</button>
    </form>

@endsection