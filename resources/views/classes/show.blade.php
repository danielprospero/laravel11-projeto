@extends('layouts.admin')

@section('content')

    <h2>Listar as aulas</h2>   

    <a href="{{ route('course.index') }}">
        <button type="button">Voltar para cursos</button>
    </a>
    <a href="{{ route('classe.create', ['course' => $classe->course->id]) }}">
        <button type="button">Cadastrar Aula</button>
    </a>

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

            
        @if ($classe->id)
            <tr>
                <td>{{ $classe->name }}</td>
                <td>{{ \Illuminate\Support\Str::limit($classe->description, 50) }}</td>
                <td>{{ $classe->order_classe }}</td>
                <td>{{ $classe->course->name }}</td>
                <td>{{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</td>
                <td>{{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</td>
                <td>
                    <div class="d-flex">
                        <button onclick="window.location.href='{{ route('classe.edit', ['classe' => $classe->id]) }}'">Editar</button>
                        <form action="{{ route('classe.destroy', ['course' => $classe->course->id, 'classe' => $classe->id]) }}" method="post" onclick="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        @else
            <tr>
                <td colspan="2">Nenhuma aula cadastrada</td>
            </tr>
        @endif
    </table>
    

@endsection
