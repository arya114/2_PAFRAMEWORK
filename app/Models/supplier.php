<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    public function Obat() {
        return $this->hasMany(Obat::class);
    }

    protected $table = 'suppliers';
    protected $fillable = ['id', 'nama', 'alamat', 'kota', 'telp'];
}
