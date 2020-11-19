<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntaPage = Pregunta::latest()->paginate(10);
        return view('pregunta.index', ['preguntaList'=>$preguntaPage])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getEncuestaList (){
        $encuestaList = Encuesta::orderBy('id', 'desc')->get()
            ->map(function ($record) {
                return array($record->id => $record->nombre);
            })->all();
        $encuestaList= array_reduce($encuestaList,function ($carray, $oValue){
            $carray[key($oValue)]=$oValue[key($oValue)];
            return $carray;
        });
        return $encuestaList;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preguntaList = Pregunta::orderBy('nombre', 'desc')
            ->get()->toArray();
        return view('pregunta.create',compact('preguntaList'));
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
            'titulo' => 'required',
            'id_encuesta' => 'required',
            'gestionLanzamiento' => 'required'
        ]);

        Pregunta::create($request->all());

        return redirect()->route('pregunta.index')
            ->with('success', 'Pregunta creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregunta = Pregunta::find($id);
        return view('pregunta.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta=Pregunta::find($id);
        return view('pregunta.edit', ['pregunta'=>$pregunta]);
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
            'nombre' => 'required',
            'idArtista' => 'required',
            'gestionLanzamiento' => 'required'
        ]);
        $pregunta = Pregunta::find($id);
        $pregunta->update($request->all());

        return redirect()->route('pregunta.index')
            ->with('success', 'Pregunta actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pregunta::destroy($id);
        return redirect()->route('pregunta.index')
            ->with('success', 'Pregunta eliminada satisfactoriamente');
    }
}
