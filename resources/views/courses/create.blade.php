@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Cadastrar o cursos</h2>
 
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

    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome do curso" value="{{ old('name') }}" >
        <input type="text" name="price" placeholder="Preço do curso" value="{{ old('price') }}" >
        <button type="submit">Cadastrar</button>
    </form>

@endsection