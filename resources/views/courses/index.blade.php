@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')
    <h2>Listar os cursos</h2>
 
    <a href="{{ route('course.create') }}">Criar um curso</a> <br>

    <x-alert/>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
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
                    <td>{{ number_format($course->price, 2, ',', '.') }}</td>
                    <td>{{ $course->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $course->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('classe.index', ['course' => $course->id]) }}">Aulas</a>
                        <a href="{{ route('course.show', ['course' => $course->id]) }}">Visualizar</a>
                        <a href="{{ route('course.edit', ['course' => $course->id]) }}">Editar</a>
                        <a href="{{ route('course.destroy', ['course' => $course->id]) }}" onclick="event.preventDefault(); if (confirm('Deseja excluir o curso?')) { document.getElementById('form-course-destroy-{{ $course->id }}').submit(); }">Excluir</a>
                    </td>
                </tr>
                <form id="form-course-destroy-{{ $course->id }}" action="{{ route('course.destroy', ['course' => $course->id]) }}" method="POST" style="display: none;">
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
