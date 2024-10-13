@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Proyecto</h1>

    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
        </div>

        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select class="form-select" id="usuario_id" name="usuario_id" required>
                <!-- Aquí deberías llenar los usuarios desde el controlador o desde una colección -->
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Proyecto</button>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
