@extends('layouts.admin')

@section('content')

    <h2>Listar as aulas</h2>   

    <a href="{{ route('course.index') }}">Voltar</a>
    <a href="{{ route('classe.create', ['course' => $course->id]) }}">Cadastrar aula</a>

    <x-alert/>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ordenação</th>
            <th>Curso</th>
            <th>Cadastrada em</th>
            <th>Atualizada em</th>
            <th>Ações</th>
        </tr>
        @forelse ($classes as $classe)
            <tr>
                <td>{{ $classe->name }}</td>
                <td>{{ $classe->description }}</td>
                <td>{{ $classe->order_classe }}</td>
                <td>{{ $classe->course->name }}</td>
                <td>{{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</td>
                <td>{{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</td>
                <td>
                    {{-- <a href="{{ route('classe.edit', $classe->id) }}">Editar</a>
                    <form action="{{ route('classe.destroy', $classe->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form> --}}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Nenhuma aula cadastrada</td>
            </tr>
        @endforelse
    </table>
    

@endsection
