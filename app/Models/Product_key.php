<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_key extends Model
{
    use HasFactory;
    protected $fillable = ["product_key" , "expire_date"];
}
