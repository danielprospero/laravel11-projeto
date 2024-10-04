@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Listar os cursos</h2>
 
    <a href="{{ route('courses.create') }}">Criar um curso</a> <br>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('courses.index') }}">Listar</a> <br>
    <a href="{{ route('courses.create') }}">Criar um curso</a> <br>

@endsection