<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'street',
        'city',
        'state',
        'zip_code',
        // Add other address fields as needed
    ];

    // Inverse relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
