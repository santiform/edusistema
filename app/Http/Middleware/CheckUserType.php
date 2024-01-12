<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    public function handle($request, Closure $next, ...$userTypes)
    {
        // Si no se proporcionan parámetros, se permite el acceso a la ruta
        if (empty($userTypes)) {
            return $next($request);
        }

        if (auth()->check() && in_array(auth()->user()->tipo, $userTypes)) {
            return $next($request);
        }

         // Redirige al usuario a una vista que indique que no está autorizado
        return view('errores.noestasautorizado');

    }

}
