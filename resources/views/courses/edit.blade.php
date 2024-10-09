@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Editar o cursos</h2>
 
    <a href="{{ route('courses.index') }}">Listar</a> <br>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('courses.update', $course->id) }}"  method="POST">
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