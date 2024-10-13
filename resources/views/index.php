@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proyectos y Usuarios Asignados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('proyecto_usuario.create', $proyecto->id) }}" class="btn btn-primary">Asignar Usuario</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Proyecto</th>
                <th>Usuarios Asignados</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>
                        <ul>
                            @foreach($proyecto->usuarios as $usuario)
                                <li>{{ $usuario->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('proyecto_usuario.edit', $proyecto->id) }}" class="btn btn-warning">Editar Asignación</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
