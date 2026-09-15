<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table="warga";
    protected $fillable = ["nik","nama","no_rumah","no_hp","status_hunian","status_aktif"];
}
