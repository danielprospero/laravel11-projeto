@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Cadastrar o cursos</h2>
 
    <a href="{{ route('courses.index') }}">Listar</a> <br>

    <x-alert/>  

    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome do curso" value="{{ old('name') }}" >
        <input type="text" name="price" placeholder="Preço do curso" value="{{ old('price') }}" >
        <button type="submit">Cadastrar</button>
    </form>

@endsection