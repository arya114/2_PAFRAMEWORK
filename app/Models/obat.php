<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class obat extends Model
{
    use HasFactory;

    public function supplier() {
        return $this->belongsTo(supplier::class);
    }
    
    public function transaksi_detail() {
        return $this->hasMany(transaksi_detail::class);
    }

    protected $table = 'obats';
    protected $fillable = ['kode', 'supplier_id', 'nama_obat', 'produsen', 'stok', 'harga'];
}
