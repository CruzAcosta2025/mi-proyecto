@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $proyecto->nombre }}</h1>
    <p><strong>Descripción:</strong> {{ $proyecto->descripcion }}</p>
    <p><strong>Fecha Inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
    <p><strong>Fecha Fin:</strong> {{ $proyecto->fecha_fin }}</p>

    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
