<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
 protected $table = 'categorias';
    protected $primaryKey = 'idcategoria';
 protected $fillable = ['nombre', 'descripcion'];
 public $timestamps = false;
}
