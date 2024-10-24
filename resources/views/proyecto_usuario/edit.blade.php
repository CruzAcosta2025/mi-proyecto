@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Asignación de Usuario a Proyecto</h1>
  
    <form action="{{ route('proyecto_usuario.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Para indicar que es una actualización -->
        
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select class="form-select" id="usuario_id" name="usuario_id" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $proyecto->usuarios->contains($usuario->id) ? 'selected' : '' }}>
                        {{ $usuario->nombres }} {{ $usuario->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('proyecto_usuario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
