<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tareas;

class Categorias extends Model
{
    use HasFactory;

    public function tareasv(){
        return $this->hasMany(tareas::class);
    }

}
