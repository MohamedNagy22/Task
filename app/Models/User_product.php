<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_product extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","product_key" ,"created_date" , "expire_date"];
}
