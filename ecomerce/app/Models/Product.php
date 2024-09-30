<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 
    
    // Change this to 'id' if that is the primary key in your products table
    protected $table = 'products'; 
    protected $primaryKey = 'id'; // Update this line
    
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
        return $this->belongsToMany(User::class, 'cart_entry')
            ->withPivot('total_price', 'product_amount')
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
