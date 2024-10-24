@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Asignación</h1>
    <h3>Proyecto: {{ $proyecto->nombre }}</h3>
    <h4>Usuarios Asignados:</h4>
    <ul>
        @foreach ($proyecto->usuarios as $usuario)
            <li>{{ $usuario->name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('proyecto_usuario.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
