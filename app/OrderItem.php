<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['precio', 'cantidad', 'idproducto','order_id'];

    public $timestamps = false;

    //relacion con la talba usuario
    public function order(){
        return $this -> belongsTo('App\Order');
    }

    //relacion con la tabla orderItem
    public function product(){
        return $this -> belongsTo('App\Producto');
    }

}
