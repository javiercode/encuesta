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
        $encuestaList = Encuesta::orderBy('nombre', 'asc')->get()
            ->map(function ($record) {
                return array($record->id => $record->nombre);
            })->all();
        $encuestaList= array_reduce($encuestaList,function ($carray, $oValue){
            $carray[key($oValue)]=$oValue[key($oValue)];
            return $carray;
        });

        return view('pregunta.index', ['preguntaList'=>$preguntaPage, 'encuestaList'=>$encuestaList])
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


    public function getTipo (){
        $encuestaList = [
            'radio'=>['name'=>'Varias Opciones(una respuesta)', 'key'=>'radio'],
            'checkbox'=>['name'=>'Varias Opciones(varias respuesta)','key'=>'checkbox'],
            'text'=>['name'=>'Respuesta corta','key'=>'text'],
            'textarea'=>['name'=>'Respueta de parrafo','key'=>'textarea'],
            'file'=>['name'=>'Archivos','key'=>'file'],
        ];
        return $encuestaList;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encuentaList = Encuesta::orderBy('nombre', 'desc')
            ->get()->toArray();
//        print_r($encuentaList);exit;
//        return view('pregunta.create',compact('encuentaList'));
        return view('pregunta.create',['encuestaList'=>$encuentaList,'tipoEncuesta'=>$this->getTipo()]);
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
            'tipo' => 'required'
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
        $encuentaList = Encuesta::orderBy('nombre', 'desc')
            ->get()->toArray();
        return view('pregunta.edit', ['pregunta'=>$pregunta, 'encuestaList'=>$encuentaList, 'tipoEncuesta'=>$this->getTipo()]);
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
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        Pregunta::destroy($request->all()['id']);
        return response()->json([
            'success' => 'Pregunta eliminada satisfactoriamente']);
    }
}
