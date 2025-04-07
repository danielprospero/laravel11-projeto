@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Editar o cursos</h2>
 
    <a href="{{ route('course.index') }}">
        <button type="button">Listar</button>
    </a> <br>

    <x-alert/>

    <form action="{{ route('course.update', $course->id) }}"  method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome do curso</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{ old('name') ?? $course->name }}" required>
        @error('name')
            {{ $message }}
        @enderror
        <br>
        <label for="price">Preço do curso</label>
        <input type="text" name="price" id="price" placeholder="Preço do curso" value="{{ old('price') ?? $course->price }}" required>
        @error('price')
            {{ $message }}
        @enderror
        <br>
        <button type="submit">Atualizar</button>
    </form>

@endsection