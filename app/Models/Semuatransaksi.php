<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semuatransaksi extends Model
{
    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Semuabarang::class, 'id_barang', 'id');
    }
}
