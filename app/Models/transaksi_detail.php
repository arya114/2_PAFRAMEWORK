<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    use HasFactory;

    public function obat()
	{
	      return $this->belongsTo(obat::class);
	}

	public function transaksi()
	{
	      return $this->belongsTo(transaksi::class);
	}

    protected $table = 'transaksi_details';
    protected $fillable = ['obat_id', 'transaksi_id', 'jumlah', 'jumlah_harga'];
}
