@extends('layouts.admin')

@section('content')

    <h2>Editar aula</h2>   

    <a href="{{ route('course.index') }}">Voltar</a>
    <a href="{{ route('classe.index', ['course' => $course->id]) }}">Listar aulas</a>

    <x-alert/>

    <form action="{{ route('classe.update', $classe->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="{{ $classe->name }}" required><br>
        @error('name')
            {{ $message }}
        @enderror
        <br>
        <label for="description">Descrição:</label><br>
        <textarea name="description" id="description" required>{{ $classe->description }}</textarea><br>
        @error('description')
            {{ $message }}
        @enderror
        <br>
        <label for="order_classe">Ordenação:</label><br>
        <input type="number" name="order_classe" id="order_classe" value="{{ $classe->order_classe }}" required><br>
        @error('order_classe')
            {{ $message }}
        @enderror
        <br>
        <label for="course_id">Curso:</label><br>
        <input type="text" value="{{ $course->name }}" disabled><br>
        <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
        @error('course_id')
            {{ $message }}
        @enderror
        <br>
        <button type="submit">Atualizar</button>
    </form>

@endsection