<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kepala extends Model
{
    protected $fillable = ['name', 'sambutan', 'image_path'];
}
