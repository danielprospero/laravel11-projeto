@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h1 class="mt-3">Cursos</h1>
        <ol class="breadcrumb mb-4 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('course.index') }}" class="text-decoration-none">Cursos</a>
            </li>
            <li class="breadcrumb-item active">Aulas</li>
        </ol>
    </div>
    <div class="card ">
        <div class="card-header hstack gap-2">
            <span>Aulas</span>
            <span class="ms-auto">
                <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-plus"></i> Adicionar Aula
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
                    <th>Descrição</th>
                    <th>Ordenação</th>
                    <th>Curso</th>
                    <th>Cadastrada em</th>
                    <th>Atualizada em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($classes as $classe)
                    <tr>
                        <td>{{ $classe->id }}</td>
                        <td>{{ $classe->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($classe->description, 50) }}</td>
                        <td>{{ $classe->order_classe }}</td>
                        <td>{{ $classe->course->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</td>
                        <td class="d-md-flex flex-column flex-md-row gap-2">
                            <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}" class="btn btn-warning btn-sm  mb-1 mb-md-0">
                                Editar
                            </a>
                            <a href="{{ route('classe.show', ['course' => $course->id, 'classe' => $classe->id]) }}" class="btn btn-primary btn-sm  mb-1 mb-md-0">
                                Visualizar
                            </a>
                            <a href="{{ route('classe.destroy', ['course' => $course->id, 'classe' => $classe->id]) }}" class="btn btn-danger btn-sm mb-md-0" onclick="event.preventDefault(); if (confirm('Deseja excluir a aula?')) { document.getElementById('form-classe-destroy-{{ $classe->id }}').submit(); }">
                                Excluir
                            </a>
                            <form id="form-classe-destroy-{{ $classe->id }}" action="{{ route('classe.destroy', ['course' => $course->id, 'classe' => $classe->id]) }}" method="post" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger" role="alert">
                        Nenhuma aula cadastrada
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    
@endsection
