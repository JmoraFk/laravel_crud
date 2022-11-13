<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "products";
    protected $default = [];
    protected $fillable = [
        "name",
        "description",
        "price",
        "created_by",
        "last_updated",
    ];
    protected $cast = [];

    
}
