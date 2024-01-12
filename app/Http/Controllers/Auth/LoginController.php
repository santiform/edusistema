<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->tipo === 'admin') {
            return redirect()->route('index.adm2023divox');
        } elseif ($user->tipo === 'estudiante') {
            return redirect()->route('index.estudiantes');
        } elseif ($user->tipo === 'profesor') {
            return redirect()->route('index.profesores');
        } else {
            // Si el tipo de usuario no coincide con ninguno de los casos anteriores,
            // redirige a una ruta por defecto o muestra un mensaje de error
            return view('auth.login');
        }
    }




        public function showLoginForm()
        {
            return view('auth.login');
        }




}
