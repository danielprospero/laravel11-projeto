@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Visualizar o curso</h2>

    <p>ID: {{ $course->id }}</p>
    <p>Nome: {{ $course->name }}</p>
    <p>Preço: R$ {{ number_format($course->price, 2, ',', '.') }}</p>
    <p>Criado em: {{ $course->created_at ? $course->created_at->format('d/m/Y H:i:s') : 'Não definido' }}</p>
    <p>Atualizado em: {{ $course->updated_at ? $course->updated_at->format('d/m/Y H:i:s') : 'Não definido' }}</p>

 
    <a href="{{ route('course.index') }}">
        <button type="button">Listar</button>
    </a> 
    <a href="{{ route('course.edit', $course->id) }}">
        <button type="button">Editar</button>
    </a>
    <a href="{{ route('course.destroy', ['course' => $course->id]) }}" onclick="event.preventDefault(); if (confirm('Deseja excluir o curso?')) { document.getElementById('form-course-destroy-{{ $course->id }}').submit(); }">
        <button type="button">Excluir</button>
    </a>


@endsection

