<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class, 'manufacture_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id');
    }




}
