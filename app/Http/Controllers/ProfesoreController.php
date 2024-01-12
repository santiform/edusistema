<?php

namespace App\Http\Controllers;

use App\Models\Profesore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class ProfesoreController
 * @package App\Http\Controllers
 */
class ProfesoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesore::orderBy('apellido', 'desc')->get();


        return view('adm2023divox.profesore.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesore = new Profesore();
        return view('adm2023divox.profesore.create', compact('profesore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Profesore::$rules);

        $profesore = Profesore::create($request->all());

        DB::table('users')->insert([
        'dni' => $request->input('dni'),
        'tipo' => "profesor",
        'name' => $request->input('apellido')." ".$request->input('nombre'),
        'email' => $request->input('mail'),
        'password' => bcrypt($request->input('celular')),

        ]);

        return redirect()->route('profesores.index')
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
        $profesore = Profesore::find($id);

        return view('adm2023divox.profesore.show', compact('profesore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesore = Profesore::find($id);

        return view('adm2023divox.profesore.edit', compact('profesore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Profesore $profesore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesore $profesore)
    {
        request()->validate(Profesore::$rules);

        $profesore->update($request->all());

        DB::table('users')->updateOrInsert(
            ['dni' => $request->input('dni')],
            [
                'tipo' => "profesor",
                'name' => $request->input('apellido')." ".$request->input('nombre'),
                'email' => $request->input('mail'),
            ]
        );

        return redirect()->route('profesores.index')
            ->with('editar', 'ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $profesore = Profesore::find($id)->delete();

        return redirect()->route('profesores.index')
            ->with('borrar', 'ok');
    }
}
