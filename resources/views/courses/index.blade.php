@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h1 class="mt-3">Cursos</h1>
        <ol class="breadcrumb mb-4 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Cursos</li>
        </ol>
    </div>
    <div class="card ">
        <div class="card-header hstack gap-2">
            <span>Listar</span>
            <span class="ms-auto">
                <a href="{{ route('course.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-plus"></i> Adicionar Curso
                </a>
            </span>
        </div>
    </div>
    <div class="card-body">
        <x-alert/>
        <table class="table table-striped table-bordered">
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
                        <td class="d-md-flex flex-column flex-md-row gap-2">
                            <a href="{{ route('classe.index', ['course' => $course->id]) }}" class="btn btn-info btn-sm mb-1 mb-md-0">
                                Aulas
                            </a>
                            <a href="{{ route('course.show', ['course' => $course->id]) }}" class="btn btn-primary btn-sm  mb-1 mb-md-0">
                                Visualizar
                            </a>
                            <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="btn btn-warning btn-sm  mb-1 mb-md-0">
                                Editar
                            </a>
                            <a href="{{ route('course.destroy', ['course' => $course->id]) }}" class="btn btn-danger btn-sm mb-md-0" onclick="event.preventDefault(); if (confirm('Deseja excluir o curso?')) { document.getElementById('form-course-destroy-{{ $course->id }}').submit(); }">
                                Excluir
                            </a>
                        </td>
                    </tr>

                    {{-- Formulário para exclusão --}}
                    <form id="form-course-destroy-{{ $course->id }}" action="{{ route('course.destroy', ['course' => $course->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                @empty
                    <div class="alert alert-danger" role="alert">
                        Nenhum curso encontrado.
                    </div>
                @endforelse
                
            </tbody>
        </table>
        
        {{ $courses->links() }}

    </div>
</div>

@endsection
