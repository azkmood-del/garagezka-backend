<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan semua data booking.
     */
    public function index()
    {
        return response()->json(
            Booking::with(['user', 'vehicle', 'service'])->get(),
            200
        );
    }

    /**
     * Menyimpan data booking baru.
     */
    public function store(Request $request)
    {
        $booking = Booking::create($request->all());

        return response()->json([
            'message' => 'Booking berhasil ditambahkan.',
            'data' => $booking
        ], 201);
    }

    /**
     * Menampilkan detail booking berdasarkan ID.
     */
    public function show(string $id)
    {
        $booking = Booking::with(['user', 'vehicle', 'service'])->find($id);

        if (!$booking) {
            return response()->json([
                'message' => 'Data booking tidak ditemukan.'
            ], 404);
        }

        return response()->json($booking, 200);
    }

    /**
     * Mengubah data booking.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'message' => 'Data booking tidak ditemukan.'
            ], 404);
        }

        $booking->update($request->all());

        return response()->json([
            'message' => 'Booking berhasil diperbarui.',
            'data' => $booking
        ], 200);
    }

    /**
     * Menghapus data booking.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'message' => 'Data booking tidak ditemukan.'
            ], 404);
        }

        $booking->delete();

        return response()->json([
            'message' => 'Booking berhasil dihapus.'
        ], 200);
    }
}