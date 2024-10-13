<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Proyecto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/index_create_project.css') }}">
</head>
<body>
    <div class="container">
        <h1>Nuevo Proyecto</h1>
        <!-- Formulario para crear un nuevo proyecto -->
        <form action="{{ route('proyectos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" required>
                
                <label for="status">Estado</label>
                <div class="status">
                    <input type="text" id="status" name="status" value="Pending" readonly>
                    <span>Pendiente</span>
                </div>
            </div>
            <div class="form-group">
                <label for="start-date">Fecha Inicio</label>
                <input type="date" id="start-date" name="start_date" placeholder="dd/mm/aaaa" required>
                
                <label for="end-date">Fecha Fin</label>
                <input type="date" id="end-date" name="end_date" placeholder="dd/mm/aaaa" required>
            </div>
            <div class="form-group">
                <label for="project-manager">Lider Proyecto</label>
                <select id="project-manager" name="project_manager" required>
                    <option value="">Por favor selecciona aquí</option>
                    <!-- Agregar opciones de líderes de proyecto -->
                </select>
                
                <label for="project-team-members">Miembros</label>
                <select id="project-team-members" name="project_team_members[]" multiple required>
                    <option value="">Selecciona aquí</option>
                    <!-- Agregar opciones de miembros del equipo -->
                </select>
            </div>
            <div class="description">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="buttons">
                <button type="submit" class="save">Guardar</button>
                <a href="{{ route('proyectos.index') }}" class="cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
