@extends('layout')

@section('title', 'Cargos')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">Listado de Cargos</h1>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Perfiles</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cargos as $cargo)
            <tr>
                <th scope="row">{{ $cargo->id }}</th>
                <td>{{ $cargo->title }}</td>
                <td>{{ $cargo->profiles_count }}</td>
                <td>
                    @if ($cargo->profiles_count == 0)
                    <form action="{{ url("cargos/{$cargo->id}") }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('sidebar')
    @parent
@endsection