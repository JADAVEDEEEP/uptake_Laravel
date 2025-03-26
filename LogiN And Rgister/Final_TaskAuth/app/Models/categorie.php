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
        return $this->hasMany(products::class, 'category_id'); // Defines the inverse relationship
    }
}
