@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Editar o cursos</h2>
 
    <a href="{{ route('course.index') }}">Listar</a> <br>

    <x-alert/>

    <form action="{{ route('course.update', $course->id) }}"  method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome do curso</label>
        <input type="text" name="name" placeholder="Nome do curso" value="{{ old('name', $course->name) }}" >
        <br>
        <label for="price">Preço do curso</label>
        <input type="text" name="price" placeholder="Preço do curso" value="{{ old('price', $course->price) }}" >
        <button type="submit">Atualizar</button>
    </form>

@endsection