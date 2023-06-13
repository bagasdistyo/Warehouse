<?php

namespace App\Http\Controllers;

use App\Models\pengadaan;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaan = Pengadaan::paginate(10);
        return response()->json( [
            'data' => $pengadaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengadaan = Pengadaan::create ([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_pengadaan' => $request->tanggal_pengadaan,
            'status_pengadaan' => $request->status_pengadaan,
        ]);
        return response()->json([
            'data' => $pengadaan
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(pengadaan $pengadaan)
    {
        return response()->json([
            'data' => $pengadaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $pengadaan = pengadaan::find($id);
        if ($pengadaan) {
            $pengadaan->update( [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'jumlah_barang' => $request->jumlah_barang,
                'tanggal_pengadaan' => $request->tanggal_pengadaan,
                'status_pengadaan' => $request->status_pengadaan,
            ]);

        return response()->json([
            'data' => $pengadaan
        ]);

    }  }

}
