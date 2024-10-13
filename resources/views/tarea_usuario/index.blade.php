@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tareas y Usuarios Asignados</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                    <th>Usuarios Asignados</th>
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
                            @foreach ($tarea->usuarios as $usuario)
                                {{ $usuario->nombre }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('tarea_usuario.create', $tarea->id) }}" class="btn btn-info">Asignar Usuario</a>
                            <a href="{{ route('tarea_usuario.edit', $tarea->id) }}" class="btn btn-warning">Editar Usuario</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
