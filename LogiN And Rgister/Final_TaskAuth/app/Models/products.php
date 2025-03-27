<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $primaryKey = 'Product_id'; // Set primary key if different from 'id'

    protected $fillable = [
        'Product_name',
        'Category_id',
        'Product_image',
        'Price',
        'created_at'
    ];
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id'); // Ensure 'category_id' is the correct foreign key
    }
}
