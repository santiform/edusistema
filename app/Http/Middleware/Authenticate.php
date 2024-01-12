<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        $user = Auth::user();

        /*if ($user && !$this->checkUserType($user)) {
            return redirect()->route('adm2023divox.error.noestasautorizado');
        }*/

        return $next($request);
    }

    /**
     * Check the user type.
     */
    private function checkUserType($user)
    {
        // Aquí verificas el tipo de usuario
        // Por ejemplo, si el tipo de usuario es 'estudiante' o 'profesor', se considera válido
        // De lo contrario, devuelve falso

        $validUserTypes = ['admin', 'estudiante', 'profesor'];
        return in_array($user->tipo, $validUserTypes);
    }
}