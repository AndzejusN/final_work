<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    use HasFactory;

    protected $table = 'product_measures';


    public function product()
    {
        return $this->hasMany(Product::class, 'measure', 'name');
    }
}


