<?php

namespace App\Models;

use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasSort, HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'quantity',
        'price',
    ];
}
