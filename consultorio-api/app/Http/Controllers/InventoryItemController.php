<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\InventoryItem;

class InventoryItemController extends Controller
{
    public function index()
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el usuario logeado
            $user = Auth::user();

            // Aquí obtenemos los insumos médicos asociados al usuario (doctora o paciente)
            $insumos = $user->inventoryItems;

            return response()->json($insumos);
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
            'quantity' => 'required|integer|min:0',
        ]);

        // Crear un nuevo insumo médico asociado al usuario logueado
        $insumo = Auth::user()->inventoryItems()->create([
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        return response()->json($insumo, 201);
    }

    public function show($id)
    {
        // Obtener un insumo médico específico asociado al usuario logueado
        $insumo = Auth::user()->inventoryItems()->findOrFail($id);

        return response()->json($insumo);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        // Actualizar un insumo médico específico asociado al usuario logueado
        $insumo = Auth::user()->inventoryItems()->findOrFail($id);
        $insumo->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        return response()->json($insumo);
    }

    public function destroy($id)
    {
        // Eliminar un insumo médico específico asociado al usuario logueado
        $insumo = Auth::user()->inventoryItems()->findOrFail($id);
        $insumo->delete();

        return response()->json(null, 204);
    }
}
