<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'birthdate',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

     // Orders (One-to-Many with foreign key user_id)
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function products_in_cart()
    {
        return $this->belongsToMany(Product::class, 'cart_entry' , 'user_id' , 'product_id')
            ->withPivot('product_amount','size')
            ->withTimestamps();
    }
    
    public function products_in_wish_list()
    {
        return $this->belongsToMany(Product::class, 'wish_list_entry' , 'user_id' , 'product_id')
        ->withTimestamps();
    }

    
}
