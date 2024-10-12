<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si la autenticación es exitosa, redirigir al usuario
            return redirect()->intended('/dashboard'); // Cambia esto por la ruta de destino deseada
        }

        // Si la autenticación falla, redirigir de nuevo con un error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    public function logout ()
    {
        Auth::logout(); // Cerrar sesión
        return redirect('/login'); // Redirigir al inicio (login)
    }
}
