<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksikas extends Model
{
    protected $table="transaksi_kas";
    protected $fillable = ["no_transaksi","jenis","kategori_id","nominal","tanggal","keterangan","lampiran","created_by"];
}
