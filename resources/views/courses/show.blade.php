@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Visualizar o curso</h2>


    <p>ID: {{ $course->id }}</p>
    <p>Nome: {{ $course->name }}</p>
    <p>Criado em: {{ $course->created_at->format('d/m/Y H:i:s') }}</p>
    <p>Atualizado em: {{ $course->updated_at->format('d/m/Y H:i:s') }}</p>

 
    <a href="{{ route('courses.index') }}">Listar</a> <br>
    <a href="{{ route('courses.edit', $course->id) }}">Editar</a> <br>
@endsection