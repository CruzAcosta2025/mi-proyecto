@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asignar Usuario a {{ $proyecto->nombre }}</h1>

    <form action="{{ route('proyecto_usuario.store', $proyecto->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select class="form-select" id="usuario_id" name="usuario_id" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Asignar Usuario</button>
        <a href="{{ route('proyecto_usuario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
