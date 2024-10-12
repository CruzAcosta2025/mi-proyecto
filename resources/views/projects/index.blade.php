<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index_project.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <h1>Lista de Proyectos</h1>
        <a href="{{ route('projects.create') }}">Añadir Nuevo Proyecto</a>
    </header>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        <!-- Aquí podrías agregar botones para editar y eliminar -->
                        <a href="#">Editar</a>
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
