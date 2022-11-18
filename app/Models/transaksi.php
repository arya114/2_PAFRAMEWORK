<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public function Obat() {
        return $this->hasMany(Obat::class);
    }

    public function admin() {
        return $this->hasMany(admin::class);
    }

    public function transaksi_detail() {
        return $this->hasMany(transaksi_detail::class);
    }

    protected $table = 'transaksis';
    protected $fillable = ['user_id', 'tanggal', 'jumlah_harga'];
}
