<?php

namespace App\Http\Controllers;

use App\Planadquisicione;
use App\Requipoai;
use App\Area;
use App\Requiproyecto;
use App\Fuente;
use App\Mese;
use App\Modalidade;
use App\Estadovigencia;
use App\Exports\PlanadquisicioneAllExport;
use App\Exports\PlanadquisicioneExport;
use App\Intervalo;
use App\Producto;
use App\Segmento;
use App\Tipoadquisicione;
use App\Tipoprioridade;
use App\Tipozona;
use App\Tipoproceso;
use App\Vigenfutura;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PlanadquisicioneController extends Controller
{
    public function __construct()
    {

        $this->middleware([
            'auth',
            'permission:planadquisiciones.index',


        ]);
    }
    // public function index()
    // {
    //     if (auth()->user()->hasRole('Admin')) {
    //         $planadquisiciones = Planadquisicione::get();
    //     } else {
    //         $planadquisiciones = Planadquisicione::where('user_id', auth()->user()->id)->get();
    //     }
    //     return view('admin.planadquisiciones.index', compact('planadquisiciones'));
    // }

    public function index(Request $request)
    {
        $years = Planadquisicione::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $vigencia = $request->get('vigencia', date('Y'));

        if (auth()->user()->hasRole('Admin')) {
            $planadquisiciones = Planadquisicione::whereYear('created_at', $vigencia)->get();
        } else {
            $planadquisiciones = Planadquisicione::where('user_id', auth()->user()->id)
                ->whereYear('created_at', $vigencia)
                ->get();
        }
        return view('admin.planadquisiciones.index', compact('planadquisiciones', 'years', 'vigencia'));
    }


    public function create()
    {
        $productos = Producto::all();
        $areas = Area::get();
        $estadovigencias = Estadovigencia::get();
        $fuentes = Fuente::get();
        $meses = Mese::get();
        $modalidades = Modalidade::get();
        $requipoais = Requipoai::get();
        $requiproyectos = Requiproyecto::get();
        $tipoadquisiciones = Tipoadquisicione::get();
        $tipoprioridades = Tipoprioridade::get();
        $tipoprocesos = Tipoproceso::get();
        $tipozonas = Tipozona::get();
        $vigenfuturas = Vigenfutura::get();
        $intervalos = Intervalo::get();
        return view('admin.planadquisiciones.create', compact('intervalos', 'areas', 'estadovigencias', 'fuentes', 'meses', 'modalidades', 'requipoais', 'requiproyectos', 'tipoadquisiciones', 'tipoprioridades', 'tipoprocesos', 'tipozonas', 'vigenfuturas', 'productos'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'descripcioncont' => ['required'],
            'valorestimadocont' => ['required'],
            'valorestimadovig' => ['required'],
            'duracont' => ['required'],
            'codbpim' => ['required'],
            'area_id' => ['required'],
            'vigenfutura_id' => ['required'],
            'tipozona_id' => ['required'],
            'estadovigencia_id' => ['required'],
            'modalidade_id' => ['required'],
            'tipoproceso_id' => ['required'],
            'tipoadquisicione_id' => ['required'],
            'requiproyecto_id' => ['required'],
            'fuente_id' => ['required'],
            'tipoprioridade_id' => ['required'],
            'mese_id' => ['required'],
            'requipoai_id' => ['required'],
            'intervalo_id' => ['required'],
        ]);

        // $planadquisicione = Planadquisicione::create($request->all()+[
        //     'user_id'=>auth()->user()->id,
        //     'slug'=> Str::slug($request->descripcioncont , '-'),  
        // ]);

        // Generar el slug base
        $slug = Str::slug($request->descripcioncont);

        // Verificar si ya existe un Planadquisicione con el mismo slug
        $counter = 1;
        while (Planadquisicione::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->descripcioncont . '-' . $counter, '-');
            $counter++;
        }

        // Obtener el último ID en la tabla y agregar 1 para generar un número de orden único
        $ultimoId = Planadquisicione::max('id') + 1;
        $slugWithId = $slug . '-' . $ultimoId;

        // Crear el Planadquisicione con el slug único
        $planadquisicione = Planadquisicione::create($request->all() + [
            'user_id' => auth()->user()->id,
            'slug' => $slugWithId,
        ]);
        // foreach ($request->producto_id as $key =>$product){
        //     $results[] = array("producto_id" => $request->producto_id[$key]);
        // }
        // $planadquisicione->productos()->sync($results);
        //planadquisicione_producto  create_planadquisicione_producto_table
        // return redirect()->route('planadquisiciones.index')->with('flash', 'registrado');

        // Redirigir a la vista de agregar producto con el plan creado
        return redirect()->route('planadquisiciones.agregar_producto', $planadquisicione->slug)
            ->with('flash', 'Plan de adquisiciones registrado correctamente');
    }


    public function show(Planadquisicione $planadquisicione)
    {
        return view('admin.planadquisiciones.show', compact('planadquisicione'));
    }


    public function edit(Planadquisicione $planadquisicione)
    {
        $productos = Producto::all();
        $areas = Area::get();
        $estadovigencias = Estadovigencia::get();
        $fuentes = Fuente::get();
        $meses = Mese::get();
        $modalidades = Modalidade::get();
        $requipoais = Requipoai::get();
        $requiproyectos = Requiproyecto::get();
        $tipoadquisiciones = Tipoadquisicione::get();
        $tipoprioridades = Tipoprioridade::get();
        $tipoprocesos = Tipoproceso::get();
        $tipozonas = Tipozona::get();
        $vigenfuturas = Vigenfutura::get();
        $intervalos = Intervalo::get();
        return view('admin.planadquisiciones.edit', compact(
            'productos',
            'areas',
            'estadovigencias',
            'fuentes',
            'meses',
            'modalidades',
            'requipoais',
            'requiproyectos',
            'tipoadquisiciones',
            'tipoprioridades',
            'tipoprocesos',
            'tipozonas',
            'vigenfuturas',
            'planadquisicione',
            'intervalos'
        ));
    }

    public function update(Request $request, Planadquisicione $planadquisicione)
    {

        $request->validate([
            'descripcioncont' => ['required'],
            'valorestimadocont' => ['required'],
            'valorestimadovig' => ['required'],
            'duracont' => ['required'],
            'codbpim' => ['required'],
            'area_id' => ['required'],
            'vigenfutura_id' => ['required'],
            'tipozona_id' => ['required'],
            'estadovigencia_id' => ['required'],
            'modalidade_id' => ['required'],
            'tipoproceso_id' => ['required'],
            'tipoadquisicione_id' => ['required'],
            'requiproyecto_id' => ['required'],
            'fuente_id' => ['required'],
            'tipoprioridade_id' => ['required'],
            'mese_id' => ['required'],
            'requipoai_id' => ['required'],
            'intervalo_id' => ['required'],
        ]);

        // $planadquisicione->update($request->all() + [
        //     'user_id' => auth()->user()->id,
        //     'slug' => Str::slug($request->descripcioncont, '-'),
        // ]);

        // Crear el nuevo slug sin el -id
        $newSlugBase = Str::slug($request->descripcioncont);

        // Mantener el -id en el slug actual
        $existingId = last(explode('-', $planadquisicione->slug));
        $newSlug = $newSlugBase . '-' . $existingId;

        // Verificar si ya existe otro registro con el mismo slug pero diferente ID
        $counter = 1;
        while (Planadquisicione::where('slug', $newSlug)->where('id', '!=', $planadquisicione->id)->exists()) {
            $newSlug = $newSlugBase . '-' . $counter;
            $counter++;
        }

        // Actualizar el registro con el nuevo slug
        $planadquisicione->update($request->all() + [
            'user_id' => auth()->user()->id,
            'slug' => $newSlug,
        ]);

        // foreach ($request->producto_id as $key =>$product){
        //     $results[] = array("producto_id" => $request->producto_id[$key]);
        // }
        // $planadquisicione->productos()->sync($results);

        return redirect()->route('planadquisiciones.index')->with('flash', 'actualizado');
    }

    public function destroy(Planadquisicione $planadquisicion)
    {
        $planadquisicion->delete();
        return redirect()->route('planadquisiciones.index')->with('flash', 'eliminado');
    }

    public function retirar_producto(Planadquisicione $planadquisicione, Producto $producto)
    {
        $producto_id = $producto->id;

        $planadquisicione->productos()->detach($producto_id);
        return redirect()->route('planadquisiciones.show', $planadquisicione)->with('flash', 'actualizado');
    }

    public function exportar_planadquisiciones_excel(Planadquisicione $planadquisicion)
    {

        return Excel::download(new PlanadquisicioneExport($planadquisicion->id), 'plan_de_adquisicion_' . $planadquisicion->id . '.xlsx');
        // 
        // plan_de_adquisicion 
    }
    public function agregar_producto(Planadquisicione $planadquisicion)
    {
        $segmentos = Segmento::all();
        return view('admin.planadquisiciones.agregar_producto', compact('planadquisicion', 'segmentos'));
    }
    public function agregar_producto_store(Request $request, Planadquisicione $planadquisicion)
    {
        $planadquisicion->productos()->attach($request->producto_id);
        return redirect()->route('planadquisiciones.show', $planadquisicion)->with('flash', 'actualizado');
    }
    public function export(Request $request)
    {
        // Obtenemos los años disponibles
        $years = Planadquisicione::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
    
        // Obtenemos la vigencia seleccionada o usamos el año actual por defecto
        $vigencia = $request->get('vigencia', date('Y'));
    
        // Aplicamos el filtro de vigencia
        $query = Planadquisicione::whereYear('created_at', $vigencia);
    
        if (!auth()->user()->hasRole('Admin') && !auth()->user()->hasRole('Supervisor')) {
            // Filtramos por usuario si no es Admin ni Supervisor
            $query->where('user_id', auth()->user()->id);
        }
    
        // Cargamos las relaciones necesarias
        $planadquisiciones = $query->with(['productos', 'mese', 'modalidade', 'fuente', 'vigenfutura', 'estadovigencia'])->get();
    
        // Exportamos a Excel
        return Excel::download(new PlanadquisicioneAllExport($planadquisiciones), "plan_adquisiciones_{$vigencia}.xlsx");
    }
    
}
