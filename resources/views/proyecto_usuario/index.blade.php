@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proyectos y Usuarios Asignados</h1>
    <a href="{{ route('proyecto_usuario.create', ['id' => $proyecto->id]) }}" class="btn btn-primary">Asignar Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Proyecto</th>
                <th>Usuarios Asignados</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>
                        @foreach ($proyecto->usuarios as $usuario)
                            <span class="badge bg-info">{{ $usuario->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('proyecto_usuario.edit', $proyecto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proyecto_usuario.destroy', $proyecto->id) }}" method="POST" style="display:inline;">
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
