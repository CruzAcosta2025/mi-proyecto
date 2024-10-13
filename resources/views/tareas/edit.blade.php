@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tarea</h1>

        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $tarea->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $tarea->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="pendiente" {{ $tarea->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en progreso" {{ $tarea->estado == 'en progreso' ? 'selected' : '' }}>En Progreso</option>
                    <option value="completada" {{ $tarea->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="prioridad">Prioridad</label>
                <select name="prioridad" class="form-control" required>
                    <option value="baja" {{ $tarea->prioridad == 'baja' ? 'selected' : '' }}>Baja</option>
                    <option value="media" {{ $tarea->prioridad == 'media' ? 'selected' : '' }}>Media</option>
                    <option value="alta" {{ $tarea->prioridad == 'alta' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                <input type="date" name="fecha_vencimiento" class="form-control" value="{{ $tarea->fecha_vencimiento }}" required>
            </div>

            <div class="form-group">
                <label for="proyecto_id">Proyecto</label>
                <select name="proyecto_id" class="form-control" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ $tarea->proyecto_id == $proyecto->id ? 'selected' : '' }}>{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Actualizar Tarea</button>
            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
