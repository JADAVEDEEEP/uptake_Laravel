<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $primaryKey = 'Size_id';

    protected $fillable = [
        'Size_id',
        'size_name',
        
       
    ];
    use HasFactory;
}
