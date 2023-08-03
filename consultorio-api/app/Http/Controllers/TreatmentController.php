<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Treatment;

class TreatmentController extends Controller
{

    public function index()
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el usuario logeado
            $user = Auth::user();

            // Aquí obtenemos los tratamientos asociados al usuario (doctora o paciente)
            $tratamientos = $user->treatments;

            return response()->json($tratamientos);
        } else {
            // El usuario no está logueado, redirigirlo a la página de inicio de sesión
            return redirect('/login');
        }
    }

    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'protocols' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Crear un nuevo tratamiento asociado al usuario logueado
        $tratamiento = Auth::user()->treatments()->create([
            'name' => $request->name,
            'duration' => $request->duration,
            'protocols' => $request->protocols,
            'description' => $request->description,
        ]);

        return response()->json($tratamiento, 201);
    }

    public function show($id)
    {
        // Obtener un tratamiento específico asociado al usuario logueado
        $tratamiento = Auth::user()->treatments()->findOrFail($id);

        return response()->json($tratamiento);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'protocols' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Actualizar un tratamiento específico asociado al usuario logueado
        $tratamiento = Auth::user()->treatments()->findOrFail($id);
        $tratamiento->update([
            'name' => $request->name,
            'duration' => $request->duration,
            'protocols' => $request->protocols,
            'description' => $request->description,
        ]);

        return response()->json($tratamiento);
    }

    public function destroy($id)
    {
        // Eliminar un tratamiento específico asociado al usuario logueado
        $tratamiento = Auth::user()->treatments()->findOrFail($id);
        $tratamiento->delete();

        return response()->json(null, 204);
    }

}
