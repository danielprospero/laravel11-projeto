@extends('layouts.admin')

@section('content')

    <h2>Editar aula</h2> 

    <a href="{{ route('course.index') }}">
        <button type="button">Voltar para cursos</button>
    </a>
    <a href="{{ route('classe.index', ['course' => $classe->course->id]) }}">
        <button type="button">Voltar para aulas</button>
    </a>

    <x-alert/>

    <form action="{{ route('classe.update', ['classe' => $classe->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') ?? $classe->name }}" required><br>
        @error('name')
            {{ $message }}
        @enderror
        <br>
        <label for="description">Descrição:</label><br>
        <textarea name="description" id="description" required>{{ old('description') ?? $classe->description }}</textarea><br>
        @error('description')
            {{ $message }}
        @enderror
        <br>
        <label for="course_id">Curso:</label><br>
        <input type="text" value="{{ $classe->course->name }}" disabled><br>
        <input type="hidden" name="course_id" id="course_id" value="{{ $classe->course->id }}">
        @error('course_id')
            {{ $message }}
        @enderror
        <br>
        <button type="submit">Atualizar</button>
    </form>

@endsection