<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Menampilkan semua notifikasi.
     */
    public function index()
    {
        return response()->json(Notification::all(), 200);
    }

    /**
     * Menyimpan notifikasi baru.
     */
    public function store(Request $request)
    {
        $notification = Notification::create($request->all());

        return response()->json([
            'message' => 'Notifikasi berhasil ditambahkan.',
            'data' => $notification
        ], 201);
    }

    /**
     * Menampilkan detail notifikasi.
     */
    public function show(string $id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json([
                'message' => 'Data notifikasi tidak ditemukan.'
            ], 404);
        }

        return response()->json($notification, 200);
    }

    /**
     * Mengubah notifikasi.
     */
    public function update(Request $request, string $id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json([
                'message' => 'Data notifikasi tidak ditemukan.'
            ], 404);
        }

        $notification->update($request->all());

        return response()->json([
            'message' => 'Notifikasi berhasil diperbarui.',
            'data' => $notification
        ], 200);
    }

    /**
     * Menghapus notifikasi.
     */
    public function destroy(string $id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json([
                'message' => 'Data notifikasi tidak ditemukan.'
            ], 404);
        }

        $notification->delete();

        return response()->json([
            'message' => 'Notifikasi berhasil dihapus.'
        ], 200);
    }
}