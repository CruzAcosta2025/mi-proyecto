// Placeholder for future interactions, like creating new boards dynamically
document.querySelector('.btn').addEventListener('click', () => {
    alert('Crear nuevo tablero');
});

document.querySelector('.btn-logout').addEventListener('click', () => {
    // Limpiar la información del usuario (esto es solo un ejemplo)
    localStorage.removeItem('userSession'); // Si estás usando localStorage para guardar la sesión
    alert('Has cerrado sesión con éxito.');

    // Redirigir a la página de inicio de sesión
    window.location.href = 'login'; // Cambia esto por la ruta de tu página de login
});
