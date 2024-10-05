@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Listar os cursos</h2>
 
    <a href="{{ route('courses.create') }}">Criar um curso</a> <br>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $course->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('courses.show', ['course' => $course->id]) }}">Visualizar</a>
                        <a href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a>
                        <a href="{{ route('courses.destroy', ['course' => $course->id]) }}" onclick="event.preventDefault(); if (confirm('Deseja excluir o curso?')) { document.getElementById('form-course-destroy-{{ $course->id }}').submit(); }">Excluir</a>
                    </td>
                </tr>
                <form id="form-course-destroy-{{ $course->id }}" action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

            @empty
                <tr>
                    <td colspan="5">Nenhum curso cadastrado</td>
                </tr>
            @endforelse

            {{ $courses->links() }}
        </tbody>

@endsection
