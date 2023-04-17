<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareas;
use App\Models\Categorias;

class TareasController extends Controller
{
    /**
     * index para mostrar todos los elementos
     * store para guardar todo
     * update para actualizar 
     *  destroy para eliminar
     * edit para mostrar el formulario de edicion 
     * es la manera convencional de llamarlos ay que no es obligatorio XD
     * required es para validar que el valor no este vacio 
     * min cantidad minima de caracteres 
     */

     public function store(Request $request){

        $request->validate([
            'Titulo' => 'required|min:3'
        ]);

        $tarea = new tareas;
        $tarea -> Titulo = $request->Titulo;
        $tarea-> categorias_id = $request->categoria_id;
        $tarea->save(); 

        return redirect()->route('tareasg')->with('success', 'Tarea creada correctamente');

     }

     public function index(){
        $taresCa = Categorias::join('tareas','Categorias.id', 'tareas.categorias_id')->select('tareas.id','Titulo', 'nombre')->get();
        $tareas = tareas::all();
        $categorias = Categorias::all();
        return view('tareas.index', ['tareas' => $tareas, 'categorias' => $categorias, 'taresCa' => $taresCa]);
     }

     public function show($id){
        $tarea = tareas::find($id);
        $categorias = Categorias::all();
        return view('tareas.show', ['tarea' => $tarea, 'categorias' => $categorias]);
     }

     public function update(Request $request,$id){
        $tarea = tareas::find($id);
        $tarea->Titulo = $request->Titulo;
        $tarea-> categorias_id = $request->categoria_id;
        $tarea->save(); 

        return redirect()->route('tareasg')->with('success', 'Tarea actualizada');

     }

     public function delete($id){
        $tarea = tareas::find($id);
        $tarea->delete();

        return redirect()->route('tareasg')->with('success', 'La tarea a sido eliminada');

     }
}
