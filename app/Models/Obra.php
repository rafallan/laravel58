<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $guarded = ['id'];

    public function generos(){
        return $this->belongsToMany('App\Models\Genero');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
}
