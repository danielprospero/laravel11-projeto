@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Cadastrar o cursos</h2>
 
    <a href="{{ route('courses.index') }}">Listar</a> <br>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome do curso" value="{{ old('name') }}" required>
        <button type="submit">Cadastrar</button>
    </form>

@endsection