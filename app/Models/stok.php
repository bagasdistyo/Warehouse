<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok',
        'quality',
    ];

    // Nama tabel yang digunakan oleh model
    protected $table = 'stoks';

    // Kolom yang dianggap sebagai kunci utama (secara default, Eloquent mengasumsikan kolom 'id' sebagai kunci utama)
    protected $primaryKey = 'id_pengecekan';

    // Menyatakan bahwa kunci utama adalah inkremen
    public $incrementing = true;

    // Menyatakan bahwa tidak ada kolom timestamp (created_at dan updated_at) pada tabel
    public $timestamps = false;
}
