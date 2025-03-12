<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    /** @use HasFactory<\Database\Factories\RangeFactory> */
    use HasFactory;

    protected $fillable = [
        'number',
        'category_id'
    ];

    public function products(){
        return $this->hasMany(Product::class,'range_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
