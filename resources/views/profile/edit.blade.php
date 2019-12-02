@extends('layout')

@section('title', "Crear usuario")

@section('content')
    @card
        @slot('header', 'Editar perfil')

        @include('shared._errors')

        <form method="POST" action="{{ url("/editar-perfil/") }}">
            {{ method_field('PUT') }}

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Pedro Perez" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="pedro@example.com" value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea name="bio" class="form-control" id="bio">{{ old('bio', $user->profile->bio) }}</textarea>
            </div>

            <div class="form-group">
                <label for="cargo_id">Cargo</label>
                <select name="cargo_id" id="cargo_id" class="form-control">
                    <option value="">Selecciona un cargo</option>
                    @foreach($cargos as $cargo)
                        <option value="{{ $cargo->id }}"{{ old('cargo_id', $user->profile->cargo_id) == $cargo->id ? ' selected' : '' }}>
                            {{ $cargo->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="https://twitter.com/Stydenet"
                       value="{{ old('twitter', $user->profile->twitter) }}">
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Actualizar perfil</button>
            </div>
        </form>
    @endcard
@endsection