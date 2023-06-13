<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = Pengembalian::paginate(10);
        return response()->json( [
            'data' => $pengembalian
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getData()
    {
        $response = Http::get('http://127.0.0.1:8000/api/komplain');
        $responseData = json_decode($response->body());
    
        if ($response->status() === 200) {
            if (!empty($responseData->data)) {
                $savedData = [];
                foreach ($responseData->data as $item) {
                    // Periksa apakah id_komplain sudah ada di database
                    $existingData = Pengembalian::where('id_komplain', $item->id_komplain)->first();
                    if (!$existingData) {
                        // Jika id_komplain tidak ada, simpan ke database
                        $data = Pengembalian::create([
                            'id_komplain' => $item->id_komplain,
                            'nama_barang' => $item->nama_barang,
                            'tanggal_pengembalian' => $item->tanggal_komplain,
                            'status' => $item->deskripsi_komplain,
                        ]);
                        $savedData[] = $data;
                    }
                }
    
                return response()->json([
                    'data' => $responseData
                ]);
            } else {
            }
        } else {
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pengembalian $pengembalian)
    {
        return response()->json([
            'data' => $pengembalian
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function status(Request $request, int $id_pengembalian)
    {
        $pengembalian = Pengembalian::create ([
            'status_penerimaan' => $request->status_penerimaan,
        ]);
        return response()->json([
            'data' => $pengembalian
        ]);

    }
}
