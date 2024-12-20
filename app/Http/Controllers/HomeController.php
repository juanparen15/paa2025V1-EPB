<?php

namespace App\Http\Controllers;

use App\Area;
use App\Clase;
use App\Dependencia;
use App\Familia;
use App\Planadquisicione;
use App\Producto;
use App\Segmento;
use App\User;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $years = Planadquisicione::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // $vigencia = $request->get('vigencia', date('Y'));
        $vigencia = $request->get('vigencia', '2025');

        $users = User::all()->count();
        $products = Producto::all()->count();
        $clases = Clase::all()->count();
        $segmentos = Segmento::all()->count();
        $familias = Familia::all()->count();
        $dependencias = Dependencia::all()->count();
        $areas = Area::all()->count();
        $adquisiciones0 = Planadquisicione::whereYear('created_at', $vigencia)->count();
        $adquisiciones = Planadquisicione::whereYear('created_at', $vigencia)->count();
        $adquisicionesDependencia = Planadquisicione::whereYear('created_at', $vigencia)->count();
        $adquisiciones1 = Planadquisicione::whereYear('created_at', $vigencia)->count();
        $adquisiciones3 = Planadquisicione::whereYear('created_at', $vigencia)->count();
        $adquisiciones2 = Planadquisicione::with('area')->whereYear('created_at', $vigencia)->get();
        $adquisicionesSeries = Planadquisicione::whereYear('created_at', $vigencia)->count();

        if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Supervisor')) {
            $planes = Planadquisicione::select(
                DB::raw("count(*) as count"),
                DB::raw("count(*) as totalmes"),
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes")
            )->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy('mes')->take(12)->get();


            $adquisiciones3 = Planadquisicione::select(
                DB::raw("count(*) as count"),
                DB::raw("sum(CAST(REPLACE(valorestimadocont, '.', '') AS DECIMAL(15,2))) as adq"),
                DB::raw("MONTH(created_at) as mes"),
                DB::raw("YEAR(created_at) as anyo")
            )
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy('anyo', 'mes')
                // ->orderBy('anyo', 'desc')
                // ->orderBy('mes', 'desc')
                ->take(12)
                ->get();


            // Traducción de meses en español
            $mesesEspanol = [
                1 => 'enero',
                2 => 'febrero',
                3 => 'marzo',
                4 => 'abril',
                5 => 'mayo',
                6 => 'junio',
                7 => 'julio',
                8 => 'agosto',
                9 => 'septiembre',
                10 => 'octubre',
                11 => 'noviembre',
                12 => 'diciembre'
            ];



            // Accede a los datos de la relación
            foreach ($adquisiciones3 as $adq) {
                // $area = $adq->area; // "area" es el nombre del método de relación en el modelo Planadquisicione
                // $nombreArea = $area->nomarea; // Accede a los campos de la relación (ejemplo: "nomarea")
                // $created_at = $adq->created_at;
                $adq->mes_traducido = $mesesEspanol[$adq->mes];
                // Puedes usar $nombreArea en tu lógica aquí
            }

            $valores = [];

            foreach ($adquisiciones2 as $adq) {
                // $nombreArea = $adq->area->nomarea;
                $created_at = $adq->created_at;
                $valores[] = ['name' => $adq->valorestimadocont, 'description' => $adq->$created_at];
            }



            $adquisiciones0 = Planadquisicione::select(
                'area_id',
                DB::raw('count(*) as adq'),
                DB::raw('MAX(areas.nomarea) as area_name'),
                // ->groupby(DB::raw("valorestimadocont"))
                // ->pluck('count')
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"),
                DB::raw("count(valorestimadocont) as adq")
            )
                ->join('areas', 'planadquisiciones.area_id', '=', 'areas.id') // Realiza una join con la tabla de áreas
                // DB::raw("count(area_id) as area_adq"))
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"))
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy(DB::raw("area_id"))
                ->get();
            // Accede a los datos de la relación
            foreach ($adquisiciones0 as $adq) {
                $area = $adq->area; // "area" es el nombre del método de relación en el modelo Planadquisicione
                $nombreArea = $area->nomarea; // Accede a los campos de la relación (ejemplo: "nomarea")
                // Puedes usar $nombreArea en tu lógica aquí
            }

            $adquisicionesDependencia = Planadquisicione::select(
                'areas.dependencia_id', // Seleccionamos dependencia_id a través de áreas
                DB::raw('count(*) as adq'), // Contamos las adquisiciones
                DB::raw('MAX(dependencias.nomdependencia) as dependencia_name'), // Nombre de la dependencia
                DB::raw("sum(CAST(REPLACE(planadquisiciones.valorestimadocont, '.', '') AS DECIMAL(15,2))) as adq") // Sumamos 'valorestimadocont' con conversión
            )
                ->join('areas', 'planadquisiciones.area_id', '=', 'areas.id') // Unimos con la tabla 'areas' usando 'area_id'
                ->join('dependencias', 'areas.dependencia_id', '=', 'dependencias.id') // Unimos 'areas' con 'dependencias' usando 'dependencia_id'
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy('areas.dependencia_id') // Agrupamos por 'dependencia_id'
                ->get();


            // Acceder a los datos
            foreach ($adquisicionesDependencia as $adq) {
                $dependencia = $adq->dependencia_name; // Nombre de la dependencia
                $cantidadAdquisiciones = $adq->adq; // Cantidad de adquisiciones
                // Aquí puedes utilizar $dependencia y $cantidadAdquisiciones
            }

            $adquisicionesSeries = Planadquisicione::select(
                'tipoadquisicione_id',
                DB::raw('count(*) as adq'),
                // DB::raw('MAX(areas.nomarea) as area_name'),
                DB::raw('MAX(tipoadquisiciones.dettipoadquisicion) as serie_name'),
                // ->groupby(DB::raw("valorestimadocont"))
                // ->pluck('count')
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"),
                DB::raw("SUM(valorestimadocont) as adq")
            )
                ->join('tipoadquisiciones', 'planadquisiciones.tipoadquisicione_id', '=', 'tipoadquisiciones.id') // Realiza una join con la tabla de áreas
                // DB::raw("count(area_id) as area_adq"))
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"))
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy(DB::raw("tipoadquisicione_id"))
                ->get();
            // Accede a los datos de la relación
            foreach ($adquisicionesSeries as $adq) {
                $tipoadquisicione = $adq->tipoadquisicione; // "area" es el nombre del método de relación en el modelo Planadquisicione
                $nombreSerie = $tipoadquisicione->dettipoadquisicion; // Accede a los campos de la relación (ejemplo: "nomarea")
                // Puedes usar $nombreArea en tu lógica aquí
            }

            $valores = [];

            foreach ($adquisiciones2 as $adq) {
                $nombreArea = $adq->area->nomarea;
                $valores[] = ['name' => $adq->valorestimadocont, 'y' => floatval($nombreArea)];
            }
        } else {
            $planes = Planadquisicione::where('user_id', auth()->user()->id)->select(
                DB::raw("count(*) as count"),
                DB::raw("count(*) as totalmes"),
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes")
            )->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy('mes')->take(12)->get();

            $adquisiciones3 = Planadquisicione::where('user_id', auth()->user()->id)->select(
                DB::raw("count(*) as count"),
                DB::raw("sum(CAST(REPLACE(valorestimadocont, '.', '') AS DECIMAL(15,2))) as adq"),
                DB::raw("MONTH(created_at) as mes"),
                DB::raw("YEAR(created_at) as anyo")
            )
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy('anyo', 'mes')
                // ->orderBy('anyo', 'desc')
                // ->orderBy('mes', 'desc')
                ->take(12)
                ->get();


            // Traducción de meses en español
            $mesesEspanol = [
                1 => 'enero',
                2 => 'febrero',
                3 => 'marzo',
                4 => 'abril',
                5 => 'mayo',
                6 => 'junio',
                7 => 'julio',
                8 => 'agosto',
                9 => 'septiembre',
                10 => 'octubre',
                11 => 'noviembre',
                12 => 'diciembre'
            ];

            $adquisiciones0 = Planadquisicione::select(
                'area_id',
                DB::raw('count(*) as adq'),
                DB::raw('MAX(areas.nomarea) as area_name'),
                // ->groupby(DB::raw("valorestimadocont"))
                // ->pluck('count')
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"),
                DB::raw("count(valorestimadocont) as adq")
            )
                ->join('areas', 'planadquisiciones.area_id', '=', 'areas.id') // Realiza una join con la tabla de áreas
                // DB::raw("count(area_id) as area_adq"))
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"))
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy(DB::raw("area_id"))
                ->get();
            // Accede a los datos de la relación
            foreach ($adquisiciones0 as $adq) {
                $area = $adq->area; // "area" es el nombre del método de relación en el modelo Planadquisicione
                $nombreArea = $area->nomarea; // Accede a los campos de la relación (ejemplo: "nomarea")
                // Puedes usar $nombreArea en tu lógica aquí
            }


            // Accede a los datos de la relación
            foreach ($adquisiciones3 as $adq) {
                // $area = $adq->area; // "area" es el nombre del método de relación en el modelo Planadquisicione
                // $nombreArea = $area->nomarea; // Accede a los campos de la relación (ejemplo: "nomarea")
                // $created_at = $adq->created_at;
                $adq->mes_traducido = $mesesEspanol[$adq->mes];
                // Puedes usar $nombreArea en tu lógica aquí
            }

            $valores = [];

            foreach ($adquisiciones2 as $adq) {
                // $nombreArea = $adq->area->nomarea;
                $created_at = $adq->created_at;
                $valores[] = ['name' => $adq->valorestimadocont, 'description' => $adq->$created_at];
            }

            // tipoadquisicione_id 

            $adquisicionesSeries = Planadquisicione::where('user_id', auth()->user()->id)->select(
                // $adquisicionesSeries = Planadquisicione::select(
                'tipoadquisicione_id',
                DB::raw('count(*) as adq'),
                // DB::raw('MAX(areas.nomarea) as area_name'),
                DB::raw('MAX(tipoadquisiciones.dettipoadquisicion) as serie_name'),
                // ->groupby(DB::raw("valorestimadocont"))
                // ->pluck('count')
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"),
                DB::raw("SUM(valorestimadocont) as adq")
            )
                ->join('tipoadquisiciones', 'planadquisiciones.tipoadquisicione_id', '=', 'tipoadquisiciones.id') // Realiza una join con la tabla de áreas
                // DB::raw("count(area_id) as area_adq"))
                // DB::raw("DATE_FORMAT(fechaInicial,'%M %Y') as anyo"))
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy(DB::raw("tipoadquisicione_id"))
                ->get();
            // Accede a los datos de la relación
            foreach ($adquisicionesSeries as $adq) {
                $tipoadquisicione = $adq->tipoadquisicione; // "area" es el nombre del método de relación en el modelo Planadquisicione
                $nombreSerie = $tipoadquisicione->dettipoadquisicion; // Accede a los campos de la relación (ejemplo: "nomarea")
                // Puedes usar $nombreArea en tu lógica aquí
            }

            $valores = [];

            foreach ($adquisiciones2 as $adq) {
                $nombreArea = $adq->area->nomarea;
                $valores[] = ['name' => $adq->valorestimadocont, 'y' => floatval($nombreArea)];
            }

            $adquisicionesDependencia = Planadquisicione::select(
                'areas.dependencia_id', // Seleccionamos dependencia_id a través de áreas
                DB::raw('count(*) as adq'), // Contamos las adquisiciones
                DB::raw('MAX(dependencias.nomdependencia) as dependencia_name'), // Nombre de la dependencia
                DB::raw("sum(CAST(REPLACE(planadquisiciones.valorestimadocont, '.', '') AS DECIMAL(15,2))) as adq") // Sumamos 'valorestimadocont' con conversión
            )
                ->join('areas', 'planadquisiciones.area_id', '=', 'areas.id') // Unimos con la tabla 'areas' usando 'area_id'
                ->join('dependencias', 'areas.dependencia_id', '=', 'dependencias.id') // Unimos 'areas' con 'dependencias' usando 'dependencia_id'
                ->whereYear('planadquisiciones.created_at', $vigencia)
                ->groupBy('areas.dependencia_id') // Agrupamos por 'dependencia_id'
                ->get();


            // Acceder a los datos
            foreach ($adquisicionesDependencia as $adq) {
                $dependencia = $adq->dependencia_name; // Nombre de la dependencia
                $cantidadAdquisiciones = $adq->adq; // Cantidad de adquisiciones
                // Aquí puedes utilizar $dependencia y $cantidadAdquisiciones
            }
        }

        return view('home', compact('vigencia', 'years', 'users', 'products', 'clases', 'segmentos', 'familias', 'adquisiciones', 'adquisicionesDependencia', 'adquisiciones0', 'adquisiciones1', 'adquisiciones2', 'adquisiciones3', 'adquisicionesSeries', 'dependencias', 'areas', 'planes'));
    }
}
