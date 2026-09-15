<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksiiuran extends Model
{
    protected $table="transaksi_iuran";
    protected $fillable = ["warga_id","iuran_id","bulan_tahun","nominal","tanggal_bayar","no_kwitansi","status"];
}
