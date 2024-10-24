<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class comunicado extends Model
{
    protected $fillable = ['titulo', 'contenido', 'orden', 'activo']; 

    public $timestamps = false;  
}
