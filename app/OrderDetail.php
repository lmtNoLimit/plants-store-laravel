<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $table = "order_detail";
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
