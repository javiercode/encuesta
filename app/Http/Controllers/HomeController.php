<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Pregunta;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $encuestaList = Encuesta::latest()->paginate(10);

        return view('dashboard', ['encuestaList'=>$encuestaList])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function graficoPregunta(){

        $preguntaList = Pregunta::select('tipo', DB::raw('count(*) as total'))
            ->groupBy('tipo')
            ->get()->toArray();

        return $preguntaList;

//        return view('encuesta.index', compact('encuestaList'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
