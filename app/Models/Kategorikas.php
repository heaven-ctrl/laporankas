<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategorikas extends Model
{
    protected $table="kategori_kas";
    protected $fillable = ["nama_kategori","jenis"];
}

