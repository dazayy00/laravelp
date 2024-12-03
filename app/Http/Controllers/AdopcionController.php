<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adopcion;

class AdopcionController extends Controller 
{
    public function inicio()
    {
        $adopciones = Adopcion::all();
    foreach ($adopciones as $adopcion) {
        if ($adopcion->imagen) {
            $adopcion->imagen_base64 = base64_encode(stream_get_contents($mascota->imagen));
            dump($adopcion);
        }
    }

    return view('adopcion', compact('adopcion'));
    }

    public function getImagen($id)
    {
        $adopcion = Adopcion::find($id);

        if($adopcion && $adopcion->imagen) {
            $raw_image_string = base64_encode(stream_get_contents($adopcion->imagen));

            return response($raw_image_string)
            ->header('Content-type', $mascota->imagen_mime);
        }
        return abort(404, 'Imagen no disponible');
    }

    public function create() {
        return view('adopcion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'edad' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:50',
        ]);
        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenBase64 = base64_encode(file_get_contents($imagen));
        } else {
            $imagenBase64 = null;
        }

        Adopcion::create([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'edad' => $request->edad,
            'peso' => $request->peso,
            'imagen' => $imagenBase64,
            'status' => $request->status,
        ]);

        return redirect()->route(adopcion.inicio)->with('success', 'Mascota registrada para adopcion.');
    }

    public function edit($id)
    {
        $adopcion = Adopcion::findOrFail($id);
        return response()->json($adopcion);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'edad' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:50',
        ]);
   
        $mascota = Mascota::findOrFail($id);
        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenBase64 = base64_encode(file_get_contents($imagen));
        } else {
            $imagenBase64 = $adopcion->Imagen;
        }

        $mascota->update([
            //'nombre' => $request->nombre,
            //'especie' => $request->especie,
            //'raza' => $request->raza,
            //'edad' => $request->edad,
            //'peso' => $request->peso,
            'imagen' => $imagenBase64,
            'status' => $request->status,
        ]);

        return redirect()->route('adopcion.inicio')->with('success', 'estatus actualizado con exito.');
    }

    public function search(Request $request) {
        $query = $request->input('query');

        if(empty($query)) {
            $adopciones = Adopcion::all();
        } else {
            $adopciones = Adopcion::where('nombre', 'like', '%' . $query . '%')
                                    ->orWhere('especie', 'like', '%' . $query . '%')
                                    ->get();
        }
        return response()->json(['adopciones' => $adopciones]);
    }
}