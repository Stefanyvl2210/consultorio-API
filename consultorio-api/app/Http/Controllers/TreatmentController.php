<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Treatment;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;

class TreatmentController extends Controller
{

    public function index()
    {
        
        // Obtener todos los tratamientos de la tabla
        $tratamientos = Treatment::all();

        // Crear un array para almacenar los datos de los tratamientos
        $tratamientosArray = [];

        // Recorrer cada tratamiento y agregar sus datos al array
        foreach ($tratamientos as $tratamiento) {
            $tratamientosArray[] = [
                'id' => $tratamiento->id,
                'name' => $tratamiento->name,
                'duration' => $tratamiento->duration,
                'protocols' => $tratamiento->protocols,
                'description' => $tratamiento->description,
            ];
        }

        // Retornar el array con todos los tratamientos
        return response()->json($tratamientosArray);
    }

    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'protocols' => 'required|in:Ninguno',
            'description' => 'nullable|string',
        ]);

        // Crear un nuevo tratamiento sin asociarlo al usuario
        $tratamiento = Treatment::create($data);

        return response()->json($tratamiento, 201);
        
    }

    public function show($id)
    {
        // Buscar el tratamiento por su ID en la tabla
        $tratamiento = Treatment::find($id);

        // Verificar si el tratamiento existe
        if (!$tratamiento) {
            return response()->json(['error' => 'treatment not found'], Response::HTTP_NOT_FOUND);
        }

        // Retornar los datos del tratamiento
        return response()->json($tratamiento);
    }

    public function update(Request $request, $id)
    {

        // Encuentra el tratamiento específico por su ID.
        $treatment = Treatment::find($id);
        
        if (!$treatment) {
            return response()->json(['error' => 'Treatment not found'], 404);
        }

        // Valida los datos del formulario enviado.
        $validatedData = $request->validate([
            'duration' => 'required|integer',
            'name' => 'required|string',
            'protocols' => 'required|in:Ninguno',
            'description' => 'required|string',
        ]);

        // Actualiza los atributos del modelo "treatment" con los datos validados.
        $treatment->update($validatedData);

        // Redirecciona a la página de detalles del tratamiento actualizado.
        return redirect()->route('treatments.show', ['treatment' => $treatment->id])
            ->with('success', 'Treatment updated successfully.');
    }

    public function destroy($id)
    {
        // Encuentra el tratamiento específico por su ID.
        $treatment = Treatment::find($id);
        
        // Si no se encuentra el tratamiento, puedes devolver un error o redireccionar a otra página.
        if (!$treatment) {
            return response()->json(['error' => 'Treatment not found'], 404);
        }

        $treatment->delete();

        return redirect()->route('treatments.index')
            ->with('success', 'Treatment successfully removed.');
    }

}
