@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/estilo4.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Proyectos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear Proyecto</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    @if ($proyectos->isEmpty())
        <tr>
            <td colspan="5" class="text-center">No hay proyectos disponibles.</td>
        </tr>
    @else
        @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->descripcion }}</td>
                <td>{{ $proyecto->fecha_inicio }}</td>
                <td>{{ $proyecto->fecha_fin }}</td>
                <td>
                    <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
</tbody>

  
    </table>
</div>
@endsection
