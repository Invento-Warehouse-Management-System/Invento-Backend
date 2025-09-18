<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Hash;

class WarehouseController extends Controller
{

    //Register new warehouse
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
        ]);

        $warehouse = Warehouse::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
            'location' => $data['location'],
        ]);

        return response()->json([
            'message' => 'Warehouse created successfully',
            'warehouse' => $warehouse
        ], 201);
    }

    //Warehouse logging
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $warehouse = Warehouse::where('name', $credentials['name'])->first();
        if (!$warehouse) {
            return response()->json([
                'message' => 'Warehouse not found',
            ],404);
        }

        if (!Hash::check($credentials['password'], $warehouse->password)) {
            return response()->json([
                'message' => 'Invalid Credentials',
            ],401);
        }
        return response()->json([
            'message' => 'Warehouse login successfully',
            'warehouse' => $warehouse
        ],200);

    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $warehouses = Warehouse::all();
        return response()->json([$warehouses],201);
    }


    public function destroy(Warehouse $warehouse): \Illuminate\Http\JsonResponse
    {
        $warehouse->delete();
        return response()->json(['message' => 'Warehouse has been deleted']);
    }

}
