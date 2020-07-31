<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    protected $fillable = ['name', 'category_id', 'description', 'quantity', 'price', 'sale_price'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function scopeSearch($query, $q) {
        return $query->where("name", "like", "%".$q."%");
    }
}
