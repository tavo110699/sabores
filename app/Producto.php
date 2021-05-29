<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';
    protected $primaryKey = 'idproducto';
    protected $fillable = ['nombre','codigo', 'descripcion','imagen','precio','idcategoria'];
    public $timestamps = false;

    public function categoria() {
        //llama al registro foraneo
        return $this->belongsTo('App\Categoria','idcategoria' );
    }
}
