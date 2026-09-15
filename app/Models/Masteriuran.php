<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masteriuran extends Model
{
    protected $table="master_iuran";
    protected $fillable = ["nama_iuran","nominal_default","tipe_periode"];
}
