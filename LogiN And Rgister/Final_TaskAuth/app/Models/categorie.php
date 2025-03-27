<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $primaryKey = 'Category_id';
    use HasFactory;

    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(products::class, 'category_id'); // Ensure 'category_id' is the correct foreign key in the products table
    }
}
