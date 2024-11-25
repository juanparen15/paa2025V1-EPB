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
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $planadquisiciones=Planadquisicione::get();
        } else {
            $planadquisiciones=Planadquisicione::where('user_id', auth()->user()->id)->get();
        }
        return view ('admin.planadquisiciones.index',compact('planadquisiciones'));
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
        return view ('admin.planadquisiciones.create',compact('intervalos', 'areas','estadovigencias','fuentes','meses','modalidades','requipoais','requiproyectos','tipoadquisiciones','tipoprioridades','tipoprocesos','tipozonas','vigenfuturas','productos'));
    }
    
    public function store(Request $request)
    {
       
        $request->validate([
            'descripcioncont'=> ['required'],
            'valorestimadocont'=> ['required'],
            'valorestimadovig'=> ['required'],
            'duracont'=> ['required'],
            'codbpim'=> ['required'],
            'area_id'=> ['required'],
            'vigenfutura_id'=> ['required'],
            'tipozona_id'=> ['required'],
            'estadovigencia_id'=> ['required'],
            'modalidade_id'=> ['required'],
            'tipoproceso_id'=> ['required'],
            'tipoadquisicione_id'=> ['required'],
            'requiproyecto_id'=> ['required'],
            'fuente_id'=> ['required'],
            'tipoprioridade_id'=> ['required'],
            'mese_id'=> ['required'],
            'requipoai_id'=> ['required'],
            'intervalo_id' => ['required', 'exists:intervalos,id'],

        ]);

        $planadquisicione = Planadquisicione::create($request->all()+[
            'user_id'=>auth()->user()->id,
            'slug'=> Str::slug($request->descripcioncont , '-'),  
        ]);

        // foreach ($request->producto_id as $key =>$product){
        //     $results[] = array("producto_id" => $request->producto_id[$key]);
        // }
        // $planadquisicione->productos()->sync($results);
        //planadquisicione_producto  create_planadquisicione_producto_table
        return redirect()->route('planadquisiciones.index')->with('flash','registrado');
    }

    
    public function show(Planadquisicione $planadquisicione)
    {
        return view ('admin.planadquisiciones.show',compact('planadquisicione'));
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
        return view ('admin.planadquisiciones.edit',compact(
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
            'vigenfuturas','planadquisicione',
            'intervalos'
        ));
    }
    
    public function update(Request $request, Planadquisicione $planadquisicione)
    {

        $request->validate([
            'descripcioncont'=> ['required'],
            'valorestimadocont'=> ['required'],
            'valorestimadovig'=> ['required'],
            'duracont'=> ['required'],
            'codbpim'=> ['required'],
            'area_id'=> ['required'],
            'vigenfutura_id'=> ['required'],
            'tipozona_id'=> ['required'],
            'estadovigencia_id'=> ['required'],
            'modalidade_id'=> ['required'],
            'tipoproceso_id'=> ['required'],
            'tipoadquisicione_id'=> ['required'],
            'requiproyecto_id'=> ['required'],
            'fuente_id'=> ['required'],
            'tipoprioridade_id'=> ['required'],
            'mese_id'=> ['required'],
            'requipoai_id'=> ['required'],
            'intervalo_id' => ['required', 'exists:intervalos,id'],
        ]);

        $planadquisicione->update($request->all()+[
            'user_id'=>auth()->user()->id,
            'slug'=> Str::slug($request->descripcioncont , '-'),  
        ]);

        // foreach ($request->producto_id as $key =>$product){
        //     $results[] = array("producto_id" => $request->producto_id[$key]);
        // }
        // $planadquisicione->productos()->sync($results);

        return redirect()->route('planadquisiciones.index')->with('flash','actualizado');
    }
    
    public function destroy(Planadquisicione $planadquisicion)
    {
        $planadquisicion->delete();
        return redirect()->route('planadquisiciones.index')->with('flash','eliminado');
    }

    public function retirar_producto(Planadquisicione $planadquisicione,Producto $producto){
        $producto_id = $producto->id;
       
        $planadquisicione->productos()->detach($producto_id);
        return redirect()->route('planadquisiciones.show', $planadquisicione)->with('flash','actualizado');
    }

    public function exportar_planadquisiciones_excel(Planadquisicione $planadquisicion){
        
        return Excel::download(new PlanadquisicioneExport($planadquisicion->id), 'plan_de_adquisicion'.$planadquisicion->id.'.xlsx');
        // 
        // plan_de_adquisicion 
    }
    public function agregar_producto(Planadquisicione $planadquisicion){
        $segmentos = Segmento::all();
        return view('admin.planadquisiciones.agregar_producto', compact('planadquisicion','segmentos'));
    }
    public function agregar_producto_store(Request $request, Planadquisicione $planadquisicion){
        $planadquisicion->productos()->attach($request->producto_id);
        return redirect()->route('planadquisiciones.show', $planadquisicion)->with('flash','actualizado');
    }
    public function export(){
        
        

        return Excel::download(new PlanadquisicioneAllExport, 'Plan de Adquisiciones en General.xlsx');
    } 
}