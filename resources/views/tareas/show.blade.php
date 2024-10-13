@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Tarea</h1>

        <h2>{{ $tarea->nombre }}</h2>
        <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
        <p><strong>Estado:</strong> {{ $tarea->estado }}</p>
        <p><strong>Prioridad:</strong> {{ $tarea->prioridad }}</p>
        <p><strong>Fecha de Vencimiento:</strong> {{ $tarea->fecha_vencimiento }}</p>
        <p><strong>Proyecto:</strong> {{ $tarea->proyecto->nombre ?? 'N/A' }}</p>

        <h3>Usuarios Asignados</h3>
        <ul>
            @foreach ($tarea->usuarios as $tareaUsuario)
                <li>{{ $tareaUsuario->usuario->name }} (Asignado el {{ $tareaUsuario->asignado_en }})</li>
            @endforeach
        </ul>

        <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver a la lista</a>
        <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
