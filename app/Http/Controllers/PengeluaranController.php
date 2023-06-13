<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::paginate(10);
        return response()->json( [
            'data' => $pengeluaran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengeluaran = Pengeluaran::create ([
            'id_pengeluaran' => $request->id_pengeluaran,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_pengeluaran' => $request ->tanggal_pengeluaran,
            'status' => $request->status
        ]);
        return response()->json([
            'data' => $pengeluaran
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(pengeluaran $pengeluaran)
    {
        return response()->json([
            'data' => $pengeluaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $pengeluaran = pengeluaran::find($id);
        if ($pengeluaran) {
            $pengeluaran->update( [
                'id_pengeluaran' => $request->id_pengeluaran,
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'jumlah_barang' => $request->jumlah_barang,
                'tanggal_pengeluaran' => $request ->tanggal_pengeluaran,
                'status' => $request->status
            ]);

        return response()->json([
            'data' => $pengeluaran
        ]);

    }  }

}
