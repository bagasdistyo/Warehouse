<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengadaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'jumlah_barang',
        'tanggal_pengadaan',
        'status_pengadaan',
    ];

    // Nama tabel yang digunakan oleh model
    protected $table = 'pengadaans';

    // Kolom yang dianggap sebagai kunci utama (secara default, Eloquent mengasumsikan kolom 'id' sebagai kunci utama)
    protected $primaryKey = 'kode_barang';

    // Menyatakan bahwa kunci utama adalah inkremen
    public $incrementing = true;

    // Menyatakan bahwa tidak ada kolom timestamp (created_at dan updated_at) pada tabel
    public $timestamps = false;
}
