<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class OpcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opcionPage = Opcion::latest()->paginate(10);

        $preguntaList = Pregunta::orderBy('titulo', 'asc')->get()
            ->map(function ($record) {
                return array($record->id => $record->titulo);
            })->all();
        $preguntaList= array_reduce($preguntaList,function ($carray, $oValue){
            $carray[key($oValue)]=$oValue[key($oValue)];
            return $carray;
        });
        return view('opcion.index', ['opcionList'=>$opcionPage, 'preguntaList'=>$preguntaList])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getPreguntaList (){
        $encuestaList = Pregunta::orderBy('id', 'desc')->get()
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
        $preguntaList = Pregunta::orderBy('titulo', 'asc')
            ->get()->toArray();
        return view('opcion.create',['preguntaList'=>$preguntaList]);
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
            'id_pregunta' => 'required',
            'valor' => 'required',
            'texto' => 'required'
        ]);

        Opcion::create($request->all());

        return redirect()->route('opcion.index')
            ->with('success', 'Opcion creada satisfactoriamente.');
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
        return view('opcion.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opcion=Opcion::find($id);
        $preguntaList = Pregunta::orderBy('titulo', 'asc')
            ->get()->toArray();
        return view('opcion.edit', ['opcion'=>$opcion, 'preguntaList'=>$preguntaList]);
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
            'id_pregunta' => 'required',
            'valor' => 'required',
            'texto' => 'required'
        ]);
        $opcion = Opcion::find($id);
        $opcion->update($request->all());

        return redirect()->route('opcion.index')
            ->with('success', 'Respuesta actualizada satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        Opcion::destroy($request->all()['id']);
        return response()->json([
            'success' => 'Opcion eliminada satisfactoriamente']);
    }
}
