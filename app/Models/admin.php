<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    public function transaksi() {
        return $this->belongsTo(transaksi::class);
    }
    protected $fillable = ['id', 'nama', 'username', 'password'];
}
