<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 
    protected $table = 'products'; 
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name',
        'price',
        'stock'
    ]; 
    protected $casts = [ 
        'created_at' => 'datetime', 
        'updated_at' => 'datetime', 
    ]; 

    public function users_cart()
    {
        return $this->belongsToMany(Product::class, 'cart_entry')
        ->withPivot('total_price')
        ->withPivot('product_amount')
        ->withTimestamps();
    }

    public function users_wish_list()
    {
        return $this->belongsToMany(Product::class, 'wish_list_entry')
        ->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_entry_products')
        ->withPivot('product_amount')
        ->withTimestamps();
    }
    //     public function productEntries(){ 
    //     return $this->belongsToMany(DiaryEntry::class, 'diary_entry_emotions') 
    //                    ->withPivot('intensity') 
    //                    ->withTimestamps(); 
    //    } 
}
