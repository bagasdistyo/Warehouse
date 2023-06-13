<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client;
use App\Models\Pengadaan;


class StokController extends Controller
{

    public function getData(Request $request)
    {
        $pengadaanData = Pengadaan::all();
    
        if ($pengadaanData->isNotEmpty()) {
            $savedData = [];
            foreach ($pengadaanData as $item) {
                // Check if kode_barang already exists in the stok table
                $existingData = Stok::where('kode_barang', $item->kode_barang)->first();
                if (!$existingData) {
                    // If kode_barang doesn't exist, save it to the stok table
                    $data = Stok::create([
                        'kode_barang' => $item->kode_barang,
                        'nama_barang' => $item->nama_barang,
                        'stok' => $item->jumlah_barang,
                    ]);
                    $savedData[] = $data;
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Berhasil menyimpan data dari Pengadaan model',
                        'data' => $savedData
                    ]);
                }
                else{
                    $savedData = Stok::select('kode_barang',
                    'nama_barang',
                    'stok',
                    'quality',)->get();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Berhasil menyimpan data dari Pengadaan model',
                        'data' => $savedData
                    ]);
                }
                
            }
    
            
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pada Pengadaan model kosong'
            ], 400);
        }
    }





    // Get the attributes from Table A
    // $stok = stok::select('kode_barang', 'nama_barang', 'jumlah_barang')->get();

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
