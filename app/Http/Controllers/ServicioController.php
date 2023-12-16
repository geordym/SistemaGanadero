<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    //


    public function show($id){
        $animal = Animal::with(['servicios' => function ($query)
            {
              $query->orderBy('fecha_aplicacion', 'asc');
            }
        ])->where('id', $id)->first();
        return view('ganadero.servicios.show')->with('animal', $animal);
    }

    public function create($id){
        $animal = Animal::find($id);
        return view('ganadero.servicios.create')->with('animal', $animal);
    }

    public function store(Request $request){
        $animal_id = $request->input('animal_id');
        $descripcion = $request->input('descripcion');
        $fecha_aplicacion = $request->input('fecha_aplicacion');
        $costo = $request->input('costo');

        $ganadero_id = auth()->user()->ganadero_id;


        $servicio = Servicio::create([
            'animal_id' => $animal_id,
            'ganadero_id' => $ganadero_id,
            'descripcion' => $descripcion,
            'fecha_aplicacion' => $fecha_aplicacion,
            'costo' => $costo
        ]);

        return redirect()->route('servicios.show', $animal_id)->with('success', 'Se ha agregado el servicio exitosamente');
    }


}
