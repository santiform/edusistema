<?php

namespace App\Http\Controllers;

use App\Models\Catedra;
use App\Models\Profesore;
use App\Models\Materia;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

/**
 * Class CatedraController
 * @package App\Http\Controllers
 */
class CatedraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $catedras = DB::table('catedras')
        ->join('materias', 'catedras.id_materia', '=', 'materias.id')
        ->join('profesores', 'catedras.dni_profesor', '=', 'profesores.dni')
        ->select('catedras.*', 'materias.nombre_materia as materianombre', 'profesores.apellido as apellidoprofesor' , 
            'profesores.nombre as nombreprofesor')
        ->orderBy('id')
        ->get();

        return view('adm2023divox.catedra.index', compact('catedras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catedra = new Catedra();
        $materias = Materia::pluck('nombre_materia', 'id')->toArray();
        $profesores = Profesore::all()->mapWithKeys(function ($profesor) {
            return [$profesor->dni => "{$profesor->apellido}, {$profesor->nombre}"];
        })->toArray();

        return view('adm2023divox.catedra.create', compact('catedra', 'materias', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Catedra::$rules);

        $catedra = Catedra::create($request->all());

        return redirect()->route('catedras.index')
            ->with('crear', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catedra = Catedra::find($id);

        return view('adm2023divox.catedra.show', compact('catedra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catedra = Catedra::join('materias', 'catedras.id_materia', '=', 'materias.id')
                  ->select('catedras.*', 'materias.nombre_materia as nombre_materia')
                  ->find($id);


        $materias = Materia::pluck('nombre_materia', 'id')->toArray();



        $profesores = Profesore::all()->mapWithKeys(function ($profesor) {
            return [$profesor->dni => "{$profesor->apellido}, {$profesor->nombre}"];
        })->toArray();


        return view('adm2023divox.catedra.edit', compact('catedra', 'profesores', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Catedra $catedra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catedra $catedra)
    {
        request()->validate(Catedra::$rules);

        $catedra->update($request->all());

        return redirect()->route ('catedras.index')
            ->with('editar', 'ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $catedra = Catedra::find($id)->delete();

        return redirect()->route('catedras.index')
            ->with('borrar', 'ok');
    }
}
