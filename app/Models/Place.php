<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Provinces;

class Place extends Model
{
    use HasFactory;

    protected $table = 'places';
    protected $fillable = [
        'province_id',
        'title', 
        'image1' , 
        'image2' ,
        'image3' ,
        'description',
        'videos',
        'location',
        
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Provinces::class , 'province_id');
    }

    
}
