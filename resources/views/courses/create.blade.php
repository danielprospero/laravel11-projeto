@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Cadastrar o cursos</h2>
 
    <a href="{{ route('courses.index') }}">Listar</a> <br>
@endsection