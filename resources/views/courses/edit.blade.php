@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Editar o cursos</h2>
 
    <a href="{{ route('courses.index') }}">Listar</a> <br>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('courses.update', $course->id) }}"  method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome do curso</label>
        <input type="text" name="name" placeholder="Nome do curso" value="{{ old('name', $course->name) }}" required>
        <br>
        <label for="price">Preço do curso</label>
        <input type="text" name="price" placeholder="Preço do curso" value="{{ old('price', $course->price) }}" required>
        <button type="submit">Atualizar</button>
    </form>

@endsection