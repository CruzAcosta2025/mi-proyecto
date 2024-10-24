<!-- Modal de Éxito -->
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successModal = new bootstrap.Modal(document.getElementById('success-modal'));

        // Muestra el modal si hay un mensaje de éxito
        if ("{{ session('success') }}") {
            successModal.show();

            // Cierra el modal después de 3 segundos
            setTimeout(function() {
                successModal.hide();
            }, 9000); // 9000 ms = 9 segundos
        }
    });
</script>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas y Proyectos</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/estilos2.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="profile-section">
            <img src="profile_image.png" alt="Perfil" class="profile-pic">
            <h3 class="profile-name" style="color: #000; background-color: #fff;" >{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h3>
        </div>

        <nav class="menu">
            <ul>
                <li><a href="#" id="dashboard-link"><span class="material-icons">dashboard</span> Dashboard</a></li>
                <li><a href="#" id="projects-link"><span class="material-icons">assignment</span> Proyectos</a></li>
                <li><a href="#" id="tasks-link"><span class="material-icons">check_circle</span> Tareas</a></li>
                <li><a href="#" id="chat-link"><span class="material-icons">chat</span> Chat</a></li>
                <li><a href="#" id="video-link"><span class="material-icons">video_call</span> Videoconferencia</a></li>
                <li><a href="#" id="edit-link"><span class="material-icons">edit</span> Edición de Documentos</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <header class="top-bar">
            <h1>Bienvenido a tu Panel</h1>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Cerrar Sesión</button>
            </form>
        </header>

        <section class="content container mt-4">
            <!-- Sección del Dashboard -->
            <div id="dashboard-section" style="display: block;"> <!-- Mostrar al cargar -->
                <h2>Dashboard</h2>
                <p>Aquí podrás ver el resumen de tus proyectos y tareas.</p>

                <div id="dashboard-cards" class="row">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3>{{ $tareasCount }}</h3>
                                <p>Tareas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3>{{ $proyectosCount }}</h3>
                                <p>Proyectos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3>{{ $usuariosCount }}</h3>
                                <p>Usuarios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sección de Proyectos -->
            <div id="projects-section" style="display: none;">
                <h2>Proyectos</h2>
                <p>Aquí podrás ver todos tus proyectos.</p>

                <!-- Botón para crear un nuevo proyecto -->
                <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear Proyecto</a>

                <div id="projects-list" class="mt-3">
                    @if ($proyectos->isEmpty())
                    <div class="alert alert-warning">No hay proyectos disponibles.</div>
                    @else
                    <table class="table mt-3" style="color: #000; background-color: #fff;">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Acciones</th> <!-- Columna para las acciones -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyectos as $proyecto)
                            <tr>
                                <td>{{ $proyecto->nombre }}</td>
                                <td>{{ $proyecto->descripcion }}</td>
                                <td>{{ $proyecto->fecha_inicio }}</td>
                                <td>{{ $proyecto->fecha_fin }}</td>
                                <td>
                                    <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>



            <!-- Sección de Tareas -->
            <div id="tasks-section" style="display: none;">
                <h2>Tareas</h2>
                <p>Aquí podrás ver todas tus tareas.</p>
                <div id="tasks-list">
                    @if ($tareas->isEmpty())
                    <div class="alert alert-warning">No hay tareas disponibles.</div>
                    @else
                    <ul class="list-group">
                        @foreach ($tareas as $tarea)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>{{ $tarea->nombre }}</div>
                            <div>
                                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <!-- Sección de Chat -->
            <div id="chat-section" style="display: none;">
                <h2>Chat</h2>
                <p>Aquí podrás chatear con tus compañeros.</p>
                <div class="chat-window border rounded p-3">
                    <p>Bienvenido al chat. Inicia una conversación.</p>
                </div>
            </div>

            <!-- Sección de Videoconferencia -->
            <div id="video-section" style="display: none;">
                <h2>Videoconferencia</h2>
                <p>Aquí podrás iniciar una videoconferencia con tus compañeros.</p>
                <button class="btn btn-primary">Iniciar Videoconferencia</button>
            </div>

            <!-- Sección de Edición de Documentos -->
            <div id="edit-section" style="display: none;">
                <h2>Edición de Documentos</h2>
                <p>Aquí podrás editar tus documentos.</p>
                <textarea class="form-control" rows="10" placeholder="Escribe aquí tu documento..."></textarea>
                <button class="btn btn-success mt-2">Guardar Documento</button>
            </div>
        </section>
    </div>

    <!-- Script para mostrar/ocultar las secciones -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            mostrarSeccion('dashboard-section'); // Muestra el dashboard al cargar
            crearGraficos(); // Crea los gráficos al cargar
        });

        function mostrarSeccion(seccionId) {
            const secciones = ['dashboard-section', 'projects-section', 'tasks-section', 'chat-section', 'video-section', 'edit-section'];

            // Oculta todas las secciones
            secciones.forEach(function(id) {
                document.getElementById(id).style.display = 'none';
            });

            // Muestra solo la sección seleccionada
            document.getElementById(seccionId).style.display = 'block';
        }

        // Eventos para mostrar las secciones correspondientes
        document.getElementById('dashboard-link').addEventListener('click', function(event) {
            event.preventDefault();
            mostrarSeccion('dashboard-section');
        });

        document.getElementById('projects-link').addEventListener('click', function(event) {
            event.preventDefault();
            mostrarSeccion('projects-section');
        });

        document.getElementById('tasks-link').addEventListener('click', function(event) {
            event.preventDefault();
            mostrarSeccion('tasks-section');
        });

        document.getElementById('chat-link').addEventListener('click', function(event) {
            event.preventDefault();
            mostrarSeccion('chat-section');
        });

        document.getElementById('video-link').addEventListener('click', function(event) {
            event.preventDefault();
            mostrarSeccion('video-section');
        });

        document.getElementById('edit-link').addEventListener('click', function(event) {
            event.preventDefault();
            mostrarSeccion('edit-section');
        });
    </script>
</body>

</html>