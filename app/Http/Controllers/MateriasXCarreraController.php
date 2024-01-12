<?php

namespace App\Http\Controllers;

use App\Models\MateriasXCarrera;
use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Materia;


/**
 * Class MateriasXCarreraController
 * @package App\Http\Controllers
 */
class MateriasXCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiasXCarreras = MateriasXCarrera::orderBy('created_at','desc')->get();

        $carreras = Carrera::orderBy('nombre_carrera')->get();

        $materias = Materia::orderBy('nombre_materia')->get();


        return view('materias-x-carrera.index', compact('materiasXCarreras', 'carreras', 'materias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiasXCarrera = new MateriasXCarrera();

        $carreras = Carrera::orderBy('nombre_carrera')->get();

        $materias = Materia::orderBy('nombre_materia')->get();

        return view('materias-x-carrera.create', compact('materiasXCarrera', 'carreras', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MateriasXCarrera::$rules);

        $materiasXCarrera = MateriasXCarrera::create($request->all());

        return redirect()->route('materias-x-carreras.index')
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
        $materiasXCarrera = MateriasXCarrera::find($id);

        return view('materias-x-carrera.show', compact('materiasXCarrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiasXCarrera = MateriasXCarrera::find($id);

        $carreras = Carrera::orderBy('nombre_carrera')->get();

        $materias = Materia::orderBy('nombre_materia')->get();

        return view('materias-x-carrera.edit', compact('materiasXCarrera', 'carreras', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MateriasXCarrera $materiasXCarrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(MateriasXCarrera::$rules);

    $materiasXCarrera = MateriasXCarrera::find($id);
    $materiasXCarrera->update($request->all());

    return redirect()->route('materias-x-carreras.index')
            ->with('editar', 'ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $materiasXCarrera = MateriasXCarrera::find($id);
    $materiasXCarrera->delete();

    return redirect()->route('materias-x-carreras.index')
        ->with('borrar', 'ok');
    }
}
