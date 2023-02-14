<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'address',
        'description',
        'price',
        'deposit',
        'owner_name',
        'owner_phone_number',
        'owner_email',
        'images',
        'status',
        'area',
    ];
}
