<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Menampilkan semua data kendaraan.
     */
    public function index()
    {
        return response()->json(Vehicle::all(), 200);
    }

    /**
     * Menyimpan data kendaraan baru.
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create($request->all());

        return response()->json([
            'message' => 'Data kendaraan berhasil ditambahkan.',
            'data' => $vehicle
        ], 201);
    }

    /**
     * Menampilkan detail kendaraan berdasarkan ID.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'Data kendaraan tidak ditemukan.'
            ], 404);
        }

        return response()->json($vehicle, 200);
    }

    /**
     * Mengubah data kendaraan.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'Data kendaraan tidak ditemukan.'
            ], 404);
        }

        $vehicle->update($request->all());

        return response()->json([
            'message' => 'Data kendaraan berhasil diperbarui.',
            'data' => $vehicle
        ], 200);
    }

    /**
     * Menghapus data kendaraan.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'Data kendaraan tidak ditemukan.'
            ], 404);
        }

        $vehicle->delete();

        return response()->json([
            'message' => 'Data kendaraan berhasil dihapus.'
        ], 200);
    }
}