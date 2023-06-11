<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = Stok::paginate(10);
        return response()->json( [
            'data' => $stok
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stok = Stok::create ([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'stok' => $request->stok,
        'quality' => $request->quality
        ]);
        return response()->json([
            'data' => $stok
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        return response()->json([
            'data' => $stok
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $stok = stok::find($id);
        if ($stok) {
            $stok->update( [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'stok' => $request->stok,
                'quality' => $request->quality
            ]);

        return response()->json([
            'data' => $stok
        ]);

    }  }

}
