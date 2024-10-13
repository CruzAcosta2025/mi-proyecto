@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Tarea</h1>

        <form action="{{ route('tareas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="en progreso">En Progreso</option>
                    <option value="completada">Completada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="prioridad">Prioridad</label>
                <select name="prioridad" class="form-control" required>
                    <option value="baja">Baja</option>
                    <option value="media">Media</option>
                    <option value="alta">Alta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                <input type="date" name="fecha_vencimiento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="proyecto_id">Proyecto</label>
                <select name="proyecto_id" class="form-control" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Crear Tarea</button>
            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
