<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'price', 'item_count'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function item_total()
    {
        $item_total = $this->price * $this->item_count;
        return $item_total;
    }

    public function no_items()
    {

        return $this->sum($this->item_count);
    }
}
