@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')


<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h1 class="mt-3">{{$course->name}}</h1>
        <ol class="breadcrumb mb-4 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('course.index') }}" class="text-decoration-none">Cursos</a>
            </li>
            <li class="breadcrumb-item active">Visualizar</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header hstack gap-2">
            <span class="fw-bold">Visualizar</span>
            <span class="ms-auto d-md-flex flex-column flex-md-row gap-2">
                <a href="{{ route('classe.index', ['course' => $course->id]) }}" class="btn btn-info btn-sm mb-1 mb-md-0">
                    Aulas
                </a>
                <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="btn btn-warning btn-sm  mb-1 mb-md-0">
                    Editar
                </a>
                <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="post" onclick="event.preventDefault(); if (confirm('Deseja excluir o curso?')) { document.getElementById('form-course-destroy-{{ $course->id }}').submit(); }">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mb-md-0">Excluir</button>
                </form>
            </span>
        </div>

        <div class="card-body">
            <x-alert/>
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $course->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $course->name }}</dd>

                <dt class="col-sm-3">Preço</dt>
                <dd class="col-sm-9">R$ {{ number_format($course->price, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Criado em</dt>
                <dd class="col-sm-9">{{ $course->created_at ? $course->created_at->format('d/m/Y H:i:s') : 'Não definido' }}</dd>

                <dt class="col-sm-3">Atualizado em</dt>
                <dd class="col-sm-9">{{ $course->updated_at ? $course->updated_at->format('d/m/Y H:i:s') : 'Não definido' }}</dd>
            </dl>
        </div>
    </div>
</div>


@endsection

