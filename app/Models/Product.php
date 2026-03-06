<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // make note about this later not 1;1 to js
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;
   protected $fillable = [
   'name',
   'price',
   'description'
   ];
}
