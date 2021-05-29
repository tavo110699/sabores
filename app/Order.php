<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['subtotal', 'envio', 'user_id'];

    //relacion con la talba usuario
    public function user(){
        return $this -> belongsTo('App\User');
    }

    //relacion con la tabla orderItem
    public function order_items(){
        return $this -> hasMany('App\OrderItem');
    }

    public function items(){
        return $this->hasMany('App\OrderItem','order_id','id');
    }

}
