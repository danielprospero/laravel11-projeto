@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
        <h1>Bem-vindo ao Laravel 11</h1>
        <actions>
            <a href="{{ route('course.index') }}">
                <button type="button">Listar Cursos</button>
            </a>
@endsection
