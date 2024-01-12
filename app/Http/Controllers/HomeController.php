<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipodeusuario = Auth::user()->tipo;



        if ($tipodeusuario === 'estudiante')  {
            return view ('estudiantes.index');
        }


        if ($tipodeusuario === 'admin')  {
            return view ('adm2023divox.index');
        }

        
        if ($tipodeusuario === 'profesor')  {
            return view ('profesores.index');
        }

    }

}
