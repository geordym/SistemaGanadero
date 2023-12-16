<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Ganadero;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InformeController extends Controller
{
    //

    public function index(){
        return view('informes.index');
    }


    public function informeanimales(){
        $animales = Animal::all();
        $data = ["animales" => $animales] ;
        $pdf = Pdf::loadView('plantillas.informes.animales.animales', $data);
        return $pdf->download('Informe Animales.pdf');
    }

    public function informeganaderos(){
        $ganaderos = Ganadero::all();
        $data = ["ganaderos" => $ganaderos] ;
        $pdf = Pdf::loadView('plantillas.informes.ganaderos.ganaderos', $data);
        return $pdf->download('Informe Ganaderos.pdf');
    }


    public function informeanimal($id){
        $animal = Animal::with(['servicios', 'vacunas'])->where('id', $id)->first();
        $pdf = Pdf::loadView('plantillas.informes.animales.animal', ['animal' =>$animal]);
        return $pdf->download('Informe Animal '. $animal->codigo . '.pdf');
    }

}
