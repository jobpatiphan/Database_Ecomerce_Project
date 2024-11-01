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

    public function user_carts()
    {
        return $this->belongsToMany(Product::class, 'cart_entry', 'user_id', 'product_id')
                    ->withPivot('total_price', 'product_amount')
                    ->withTimestamps();
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_entry_products')
        ->withPivot('product_amount')
        ->withTimestamps();
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}



    public function users_wish_list()
    {
        return $this->belongsToMany(User::class, 'wish_list_entry')
            ->withTimestamps();
    }

    // Method to check if the product is in the user's wishlist
    public function isInWishlist(User $user)
    {

        return $this->users_wish_list()->where('user_id', $user->id)->exists();
    }
    //     public function productEntries(){ 
    //     return $this->belongsToMany(DiaryEntry::class, 'diary_entry_emotions') 
    //                    ->withPivot('intensity') 
    //                    ->withTimestamps(); 
    //    } 

    public function averageRating()
{
    return $this->comments()->avg('star') ?? 0;
}

public function totalReviews()
{
    return $this->comments()->count();
}
}
