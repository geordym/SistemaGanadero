<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Vacuna;

class VacunaController extends Controller
{
    public function show($id){
        $animal = Animal::with(['vacunas' => function($query){
            $query->orderBy('fecha_vacunacion', 'asc');
        }])->where('id', $id)->first();
        $vacunas = Vacuna::where('animal_id', $animal->id)->get();
        return view('ganadero.vacunas.show')->with('animal', $animal);
    }

    public function create(Request $request, $idanimal){
        $animal = Animal::find($idanimal);
        return view('ganadero.vacunas.create')->with('animal', $animal);
    }

    public function store(Request $request){
        $request->validate([
            'animal_id' => 'required',
            'veterinario' => 'required',
            'tipo' => 'required',
            'fecha_vacunacion' => 'required',
            'fecha_vacunacion_proxima' => 'required',
            'costo' => 'required'
        ]);

        $animal_id = $request->input('animal_id');
        $ganadero_id = auth()->user()->ganadero_id;

        $veterinario = $request->input('veterinario');
        $tipo = $request->input('tipo');
        $fecha_vacunacion = $request->input('fecha_vacunacion');
        $fecha_vacunacion_proxima = $request->input('fecha_vacunacion_proxima');
        $costo = $request->input('costo');

        $vacuna = Vacuna::create([
            'animal_id' => $animal_id,
            'ganadero_id' => $ganadero_id,
            'veterinario' => $veterinario,
            'tipo' => $tipo,
            'fecha_vacunacion' => $fecha_vacunacion,
            'fecha_vacunacion_proxima' => $fecha_vacunacion_proxima,
            'costo' => $costo
        ]);


        return redirect()->route('vacunas.show', $animal_id)->with('success', 'Vacuna registrada exitosamente');
    }


}
