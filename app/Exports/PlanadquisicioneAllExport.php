<?php

namespace App\Exports;

use App\Planadquisicione;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PlanadquisicioneAllExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */


    // public function view(): View
    // {

    //     $vigencia = $request->get('vigencia', date('Y'));

    //     if (auth()->user()->hasRole('Admin')) {
    //         $planes = Planadquisicione::all();
    //     } else {
    //         $planes = Planadquisicione::where('user_id', auth()->user()->id)->get();
    //     }
    //     return view('admin.planadquisiciones.planadquisicione_all', [
    //         'planadquisiciones' => $planes
    //     ]);
    // }
    public function view(): View
    {
        $vigencia = request()->get('vigencia', date('Y'));

        if (auth()->user()->hasRole('Admin')) {
            // Filtrar los planes por la vigencia seleccionada
            $planes = Planadquisicione::whereYear('created_at', $vigencia)->get();
        } else {
            $planes = Planadquisicione::where('user_id', auth()->user()->id)
                ->whereYear('created_at', $vigencia)
                ->get();
        }

        return view('admin.planadquisiciones.planadquisicione_all', [
            'planadquisiciones' => $planes
        ]);
    }
}
