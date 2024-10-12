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
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name">
            <label for="status">Estado</label>
            <div class="status">
                <input type="text" id="status" name="status" value="Pending" readonly>
                <span>Pendiente</span>
            </div>
        </div>
        <div class="form-group">
            <label for="start-date">Fecha Inicio</label>
            <input type="date" id="start-date" name="start-date" placeholder="dd/mm/aaaa">
            <label for="end-date">Fecha Fin</label>
            <input type="date" id="end-date" name="end-date" placeholder="dd/mm/aaaa">
        </div>
        <div class="form-group">
            <label for="project-manager">Lider Proyecto</label>
            <select id="project-manager" name="project-manager">
                <option value="">Please select here</option>
            </select>
            <label for="project-team-members">Mienbros</label>
            <select id="project-team-members" name="project-team-members">
                <option value="">Selecciona aqui</option>
            </select>
        </div>
        <div class="description">
            <label for="description">Descripcion</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="buttons">
            <button class="save">Guardar</button>
            <button class="cancel">Cancelar</button>
        </div>
    </div>
</body>
</html>
