<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
 	
 	protected $guarded = [];

    public function getItemStuff() 
    {
        return $this->hasMany(Product::class, 'id');
    }

}
