<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    
    protected $fillable = ['nome', 'descricao'];

    public function obras(){
        return $this->belongsToMany('App\Models\Obra');
    }

}
