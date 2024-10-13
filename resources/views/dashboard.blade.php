<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas y Proyectos</title>
    <link rel="stylesheet" href="{{ asset('assets/css/estilos2.css') }}">
    <script defer src="scripts.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="profile-section">
            <img src="profile_image.png" alt="Perfil" class="profile-pic">
            <h3 class="profile-name">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h3>
        </div>

        <nav class="menu">
            <ul>
                <li><a href="#" id="dashboard-link"><span class="material-icons">dashboard</span> Dashboard</a></li>
                <li>
                    <a href="#" id="projects-link"><span class="material-icons">assignment</span> Proyectos</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('proyectos.create') }}">Añadir nuevo proyecto</a></li>
                        <li><a href="{{ route('proyectos.index') }}">Listar Proyectos</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" id="tasks-link"><span class="material-icons">check_circle</span> Tareas</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('tareas.create') }}">Añadir nueva tarea</a></li>
                        <li><a href="{{ route('tareas.index') }}">Listar tareas</a></li>
                    </ul>
                </li>

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
                <button type="submit" class="logout-button">Cerrar Sesión</button>
            </form>
        </header>

        <section class="content">
            <!-- Sección del Dashboard -->
            <div id="dashboard-section">
                <h2>Dashboard</h2>
                <p>Aquí podrás ver el resumen de tus proyectos y tareas.</p>

                <div id="dashboard-cards" class="dashboard-cards">
                    <div class="card">
                        <h3>2</h3>
                        <p>Admins</p>
                    </div>
                    <div class="card">
                        <h3>0</h3>
                        <p>Members</p>
                    </div>
                    <div class="card">
                        <h3>4</h3>
                        <p>Categorías</p>
                    </div>
                    <div class="card">
                        <h3>10</h3>
                        <p>Designaciones</p>
                    </div>
                </div>
            </div>

            <!-- Sección de Chat -->
            <div id="chat-section" style="display: none;">
                <h2>Chat</h2>
                <p>Aquí podrás chatear con tus compañeros.</p>
                <div class="chat-window">
                    <p>Bienvenido al chat. Inicia una conversación.</p>
                </div>
            </div>

            <!-- Sección de Videoconferencia -->
            <div id="video-section" style="display: none;">
                <h2>Videoconferencia</h2>
                <p>Aquí podrás iniciar una videoconferencia con tus compañeros.</p>
                <button class="start-video-button">Iniciar Videoconferencia</button>
            </div>

            <!-- Sección de Edición de Documentos -->
            <div id="edit-section" style="display: none;">
                <h2>Edición de Documentos</h2>
                <p>Aquí podrás editar tus documentos.</p>
                <textarea rows="10" cols="50" placeholder="Escribe aquí tu documento..."></textarea>
                <button class="save-document-button">Guardar Documento</button>
            </div>
        </section>
    </div>

    <!-- Script para mostrar/ocultar las secciones -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            mostrarSeccion('dashboard-section'); // Muestra el dashboard al cargar
        });

        function mostrarSeccion(seccionId) {
            const secciones = ['dashboard-section', 'tasks-section', 'chat-section', 'video-section', 'edit-section'];

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
            // Aquí puedes decidir mostrar un mensaje o redirigir a otra página si es necesario.
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

        document.getElementById('list-projects-link').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = "{{ route('proyectos.index') }}"; // Redirige a la lista de proyectos
        });
    </script>
</body>
</html>
