<?php

namespace App\Http\Controllers;

use App\acta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ActaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.acta.index',
            'permission:admin.acta.store',
            'permission:admin.acta.create',
            'permission:admin.acta.destroy',
            'permission:admin.acta.update',
            'permission:admin.acta.edit'
            ]);
    }
    public function index()
    {
       $actas = Acta::get();
       return view ('admin.acta.index',compact('actas'));
    }
    
    public function create()
    {
        return view ('admin.acta.create');
    }
    
    public function store(Request $request)
    {
        Acta::create([
            'det_acta'=>$request->det_acta,
            'slug'=> Str::slug($request->det_acta , '-'),
        ]);
        return redirect()->route('admin.acta.index')->with('flash','registrado');
    }
    
    public function show(acta $acta)
    {
        //
        return view ('admin.acta.show',compact('acta'));

    }

    public function edit(acta $acta)
    {
        return view ('admin.acta.edit',compact('acta'));
    }

    
    public function update(Request $request, acta $acta)
    {
        $acta->update([
            'det_acta'=>$request->det_acta,
            'slug'=> Str::slug($request->det_acta, '-'),
        ]);
        return redirect()->route('admin.acta.index')->with('flash','actualizado');
    }

    public function destroy(acta $acta)
    {
        $acta->delete();
        return redirect()->route('admin.acta.index')->with('flash','eliminado');
    }
}
