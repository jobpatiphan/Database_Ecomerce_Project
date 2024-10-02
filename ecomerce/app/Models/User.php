<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // One-to-Many relationship with orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    // Many-to-Many relationship for products in cart
    public function products_in_cart()
    {
        return $this->belongsToMany(Product::class, 'cart_entry', 'user_id', 'product_id')
            ->withPivot('product_amount', 'size')
            ->withTimestamps();
    }

    // Many-to-Many relationship for products in wishlist
    public function products_in_wish_list()
    {
        return $this->belongsToMany(Product::class, 'wish_list_entry', 'user_id', 'product_id')
            ->withTimestamps();
    }

    // One-to-One relationship with address
    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }
}
