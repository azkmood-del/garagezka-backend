<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Menampilkan semua data layanan.
     */
    public function index()
    {
        return response()->json(Service::all(), 200);
    }

    /**
     * Menyimpan data layanan baru.
     */
    public function store(Request $request)
    {
        $service = Service::create($request->all());

        return response()->json([
            'message' => 'Data layanan berhasil ditambahkan.',
            'data' => $service
        ], 201);
    }

    /**
     * Menampilkan detail layanan berdasarkan ID.
     */
    public function show(string $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'message' => 'Data layanan tidak ditemukan.'
            ], 404);
        }

        return response()->json($service, 200);
    }

    /**
     * Mengubah data layanan.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'message' => 'Data layanan tidak ditemukan.'
            ], 404);
        }

        $service->update($request->all());

        return response()->json([
            'message' => 'Data layanan berhasil diperbarui.',
            'data' => $service
        ], 200);
    }

    /**
     * Menghapus data layanan.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'message' => 'Data layanan tidak ditemukan.'
            ], 404);
        }

        $service->delete();

        return response()->json([
            'message' => 'Data layanan berhasil dihapus.'
        ], 200);
    }
}