<?php

namespace App\Models;

use App\Models\colors as ModelsColors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class SKU extends Model
{
    use HasFactory;
    protected $table = 'skus';
    protected $primaryKey = 'SKUID'; 
    protected $fillable = [
        'Product_id', 'Size_id', 'Color_id', 'Price', 'Quantity', 'SKUCode'
    ];
    public function Products()
{
    return $this->belongsTo(products::class, 'Product_id');
}

public function size()
{
    return $this->belongsTo(Size::class, 'Size_id');
}

public function Colors()
{
    return $this->belongsTo(ModelsColors::class, 'Color_id');
}
}
