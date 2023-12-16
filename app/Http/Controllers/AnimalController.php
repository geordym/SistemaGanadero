<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $animales = Animal::all();

        return view('animales.index')->with('animales', $animales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animales.create');
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
            'codigo' => 'required|unique:animales,codigo',
            'raza' => 'required',
            'color' => 'required',
            'genero' => 'required|in:macho,hembra',
            'fecha_nacimiento' => 'required|date',
            'peso' => 'required',
        ]);

        // Crear un nuevo animal
        Animal::create([
            'codigo' => $request->codigo,
            'raza' => $request->raza,
            'color' => $request->color,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'peso' => $request->peso,
        ]);

        return redirect()->route('animales.index')->with('success', 'El animal se ha creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::with(['vacunas', 'servicios'])->where('id', $id)->first();
        return view('animales.show')->with('animal', $animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('animales.edit')->with('animal', $animal);
    }





    public function update(Request $request, $id)
    {
        // Validaciones
        $request->validate([
            'codigo' => 'required|unique:animales,codigo,' . $id,
            'raza' => 'required',
            'color' => 'required',
            'genero' => 'required|in:macho,hembra',
            'fecha_nacimiento' => 'required|date',
            'vacunas' => 'required',
            'peso' => 'required',
        ]);

        // Obtener el animal a actualizar
        $animal = Animal::findOrFail($id);

        // Actualizar los datos del animal
        $animal->update([
            'codigo' => $request->codigo,
            'raza' => $request->raza,
            'color' => $request->color,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'vacunas' => $request->vacunas,
            'peso' => $request->peso,
        ]);

        return redirect()->route('animales.index')->with('success', 'El animal se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener el animal a eliminar
        $animal = Animal::findOrFail($id);

        // Eliminar el animal
        $animal->delete();

        return redirect()->route('animales.index')->with('success', 'El animal se ha eliminado exitosamente');
    }


    public function searchAnimal(){
        return view('animales.search');
    }

    public function findByCode(Request $request){
        $codigo = $request->input('codigo');
        $animal = Animal::where('codigo', $codigo)->first();

        if(!$animal){
            return redirect()->route('animales.buscar')->with('errors', 'El animal con este codigo no existe');
        }


        return view('animales.show')->with('animal', $animal);

    }




}
