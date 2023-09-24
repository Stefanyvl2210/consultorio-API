<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los items del inventario de la tabla
        $inventoryItems = InventoryItem::all();

        // Crear un array para almacenar los datos de los items del inventario
        $inventoryItemsArray = [];

        // Recorrer cada item del inventario y agregar sus datos al array
        foreach ($inventoryItems as $item) {
            $inventoryItemsArray[] = [
                'id' => $item->id,
                'name' => $item->name,
                'quantity' => $item->quantity,
            ];
        }

        // Retornar el array con todos los items del inventario
        return response()->json($inventoryItemsArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $inventoryItem = InventoryItem::create($validatedData);
        return response()->json($inventoryItem, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscar el tratamiento por su ID en la tabla
        $item = InventoryItem::find($id);

        // Verificar si el tratamiento existe
        if (!$item) {
            return response()->json(['error' => 'item not found'], Response::HTTP_NOT_FOUND);
        }

        // Retornar los datos del tratamiento
        return response()->json($item);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Encuentra el item específico por su ID.
        $inventoryItem = InventoryItem::find($id);
        
        if (!$inventoryItem) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        // Valida los datos del formulario enviado.
        $validatedData = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        // Actualiza los atributos del modelo "InventoryItem" con los datos validados.
        $inventoryItem->update($validatedData);

        return response()->json($inventoryItem);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryItem  $inventoryItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encuentra el tratamiento específico por su ID.
        $inventoryItem = InventoryItem::find($id);
        
        if (!$inventoryItem) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        $inventoryItem->delete();

        return response()->json(["message" => "Item deleted successfully"], 200);
        
    }
}
