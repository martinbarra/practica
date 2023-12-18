<?php

namespace App\Http\Controllers;

use App\Models\Cancione;
use Illuminate\Http\Request;



class CancioneController extends Controller
{
    public function index(Request $request)
{
    $canciones = Cancione::paginate();

        return view('cancione.index', compact('canciones'))
            ->with('i', (request()->input('page', 1) - 1) * $canciones->perPage());
}

    public function create()
    {
        $cancione = new Cancione();
        return view('cancione.create', compact('cancione'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'album' => 'required',
            'fecha' => 'required|date',
            'duracion' => 'required',
            'imagen' => 'sometimes|file', // Sin restricciones de tipo o tamaño
            'archivo' => 'sometimes|file', // Sin restricciones de tipo o tamaño
        ]);
    
        $cancione = Cancione::create([
            'nombre' => $request->input('nombre'),
            'album' => $request->input('album'),
            'fecha' => $request->input('fecha'),
            'duracion' => $request->input('duracion'),
            'imagen' => '', // Asignar un valor predeterminado no nulo
            'archivo' => '',
        ]);
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenPath = $imagen->storeAs('public/images', $imagen->getClientOriginalName());
            $cancione->imagen = basename($imagenPath);
        }
    
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $archivoPath = $archivo->storeAs('public/files', $archivo->getClientOriginalName());
            $cancione->archivo = basename($archivoPath);
        }
    
        $cancione->save();
    
        return redirect()->route('canciones.index')->with('success', 'Cancione created successfully.');
    }

    public function show($id)
    {
        $cancione = Cancione::findOrFail($id);

        return view('cancione.show', compact('cancione'));
    }

    public function edit($id)
    {
        $cancione = Cancione::findOrFail($id);

        return view('cancione.edit', compact('cancione'));
    }

    public function update(Request $request, Cancione $cancione)
    {
        $request->validate(Cancione::$rules);

        $cancione->update($request->all());

        return redirect()->route('canciones.index')->with('success', 'Cancione updated successfully');
    }

    public function destroy($id)
    {
        try {
            Cancione::findOrFail($id)->delete();
            return redirect()->route('canciones.index')->with('success', 'Cancione deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('canciones.index')->with('error', 'Error deleting Cancione');
        }
    }
}
