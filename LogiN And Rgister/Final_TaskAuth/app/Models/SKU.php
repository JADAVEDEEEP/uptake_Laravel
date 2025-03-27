<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    use HasFactory;
    protected $table = 'skus'; // Make sure this matches the table name
    protected $primaryKey = 'SKUID'; // Specify primary key if it's different from the default 'id'
    protected $fillable = [
        'Product_id', 'Size_id', 'Color_id', 'Price', 'Quantity', 'SKUCode'
    ];
}
