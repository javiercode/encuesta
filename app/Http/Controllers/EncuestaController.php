<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestaList = Encuesta::latest()->paginate(10);
        return view('encuesta.index', compact('encuestaList'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encuesta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'correoAutorizado' => 'required',
            'sessionAutorizado' => 'required',
            'estado' => 'required',
        ]);

        Encuesta::create($request->all());

        return redirect()->route('encuesta.index')
            ->with('success', 'Encuesta creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuesta = Encuesta::find($id);
        return view('encuesta.show', compact('encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encuesta=Encuesta::find($id);
        return view('encuesta.edit', compact('encuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $encuesta = Encuesta::find($id);
        $encuesta->update($request->all());

        return redirect()->route('encuesta.index')
            ->with('success', 'Encuesta actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Encuesta::destroy($id);
        return redirect()->route('encuesta.index')
            ->with('success', 'Encuesta eliminada satisfactoriamente');
    }
}
