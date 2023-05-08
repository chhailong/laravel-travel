<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'imageurl1',
        'cpu',
        'ram',
        'gpu',
        'storage',
        'display',
        'battery',
        'price',
        'description',
        'recommend',
        'pro',
        'con',
        'link_youtube',
        'shop_name',
        'location',

    ];
}
