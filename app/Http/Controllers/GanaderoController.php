<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Ganadero;
use App\Models\User;
use Illuminate\Http\Request;

class GanaderoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ganaderos = Ganadero::orderBy('created_at', 'DESC')->get();
        return view('ganaderos.index')->with('ganaderos', $ganaderos);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ganaderos.create');
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
            'nombres' => 'required|min:4|max:20',
            'apellidos' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:ganaderos,email'
        ]);

        // Crear un nuevo animal
        $ganadero = Ganadero::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'direccion' => $request->direccion,
            'email' => $request->email
        ]);

        if ($ganadero) {
            $user = User::create([
                'name' => $ganadero->nombres,
                'email' => $ganadero->email,
                'password' => bcrypt($ganadero->email),
                // 'id_rol' => $id_rol, // Asigna el ID del segundo rol al usuario 2
            ]);

            if($user){
                $user->ganadero_id = $ganadero->id;
                $user->save();

                if($request->input('isadmin')){
                    $user->isadmin = true;
                    $user->save();
                }

            }
        }



        return redirect()->route('ganaderos.index')->with('success', 'El Ganadero se ha creado exitosamente');
    }


    public function asignacion(){
        $ganaderos = Ganadero::all();
        $animales = Animal::where('ganadero_id', NULL)->get();
        return view('ganaderos.asignacion')->with('ganaderos', $ganaderos)->with('animales', $animales);
    }

    public function asignar(Request $request){
        $request->validate([
            'id_ganadero' => 'required',
            'id_animal' => 'required'
        ]);

        $id_ganadero = $request->input('id_ganadero');
        $id_animal = $request->input('id_animal');

        $animal = Animal::findOrFail($id_animal);
        if($animal){
            $animal->ganadero_id = $id_ganadero;
            $animal->save();
        }

        return redirect()->route('ganaderos.show', $id_ganadero)->with('success', 'Se ha asignado un nuevo ganado a este usuario exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ganadero = Ganadero::with('animales')->where('id', $id)->first();

        return view('ganaderos.show')->with('ganadero', $ganadero);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ganadero = Ganadero::find($id);
        return view('ganaderos.edit')->with('ganadero', $ganadero);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validaciones
        $request->validate([
            'nombres' => 'required|min:4|max:20',
            'apellidos' => 'required',
            'direccion' => 'required',
            'email' => 'required'
        ]);

        // Obtener el ganadero a actualizar
        $ganadero = Ganadero::findOrFail($id);

        // Actualizar los datos del ganadero
        $ganadero->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'direccion' => $request->direccion,
            'email' => 'required'
        ]);

        return redirect()->route('ganaderos.index')->with('success', 'El ganadero se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener el ganadero a eliminar
        $ganadero = Ganadero::findOrFail($id);

        // Eliminar el ganadero
        $ganadero->delete();

        return redirect()->route('ganaderos.index')->with('success', 'El ganadero se ha eliminado exitosamente');
    }


    /**
     * Ganadero Client Methods
     */

     public function animales(){
        $ganadero_id = auth()->user()->ganadero_id;
        $animales = Animal::where('ganadero_id', $ganadero_id)->get();

        return view('ganadero.animales')->with('animales', $animales);
     }

     public function editgalera($idanimal){
       $animal = Animal::find($idanimal);
       return view('ganadero.galera')->with('animal', $animal);
     }

     public function updategalera(Request $request){
        $id_animal = $request->input('id');
        $galera = $request->input('galera');

        $animal = Animal::find($id_animal);

        $animal->galera = $galera;

        $animal->save();

        return redirect()->route('ganadero.animales')->with('success', 'Galera actualizada exitosamente');
     }







}
