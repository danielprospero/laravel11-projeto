@extends('layouts.admin') {{-- Certifique-se de estar estendendo um layout, se necessário --}}

@section('content')


    <h2>Visualizar o curso</h2>
    <a href="{{ route('course.index') }}">
        <button type="button">Listar</button>
    </a> <br>
    <x-alert/>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
            <th>Ações</th>
        </tr>
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>R$ {{ number_format($course->price, 2, ',', '.') }}</td>
            <td>{{ $course->created_at ? $course->created_at->format('d/m/Y H:i:s') : 'Não definido' }}</td>
            <td>{{ $course->updated_at ? $course->updated_at->format('d/m/Y H:i:s') : 'Não definido' }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('course.edit', $course->id) }}">
                        <button type="button">Editar</button>
                    </a>
                    <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="post" onclick="event.preventDefault(); if (confirm('Deseja excluir o curso?')) { document.getElementById('form-course-destroy-{{ $course->id }}').submit(); }">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>


@endsection

