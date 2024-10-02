<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $table = 'Order'; 
    // protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id', 
        //'Product id',
        //'product_amount',
        'total_price'
    ]; 
    protected $cast = [
        'date' => 'datetime',
        'create_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products_in_order()
    {
        return $this->belongsToMany(Product::class, 'order_entry_products' , 'order_id' , 'product_id')
                    ->withPivot('product_amount')
                    ->withTimestamps();
    }
    // // Relation to Product model (assuming many-to-one relationship)
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
    
    // Accessor for formatted total price
    // public function getFormattedTotalPriceAttribute()
    // {
    //     return number_format($this->total_price, 2);
    // }

    // // Function to calculate total price based on product amount and unit price
    // public function calculateTotalPrice($unit_price)
    // {
    //     return $this->product_amount * $unit_price;
    // }

    // // Scope for filtering by user
    // public function scopeByUser($query, $userId)
    // {
    //     return $query->where('user_id', $userId);
    // }

    // // Accessor for formatted date
    // public function getFormattedDateAttribute()
    // {
    //     return Carbon::parse($this->date)->format('d/m/Y');
    // }
}
