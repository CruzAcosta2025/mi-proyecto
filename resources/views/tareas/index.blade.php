@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tareas</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tareas.create') }}" class="btn btn-primary">Crear Nueva Tarea</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Prioridad</th>
                    <th>Fecha Vencimiento</th>
                    <th>Proyecto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->nombre }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->prioridad }}</td>
                        <td>{{ $tarea->fecha_vencimiento }}</td>
                        <td>{{ $tarea->proyecto->nombre ?? 'N/A' }}</td>
                        <td>
                            <!-- Acción "Ver" -->
                            <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-info">Ver</a>

                            <!-- Acción "Editar" -->
                            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning">Editar</a>

                            <!-- Acción "Eliminar" -->
                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
