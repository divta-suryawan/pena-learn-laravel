<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'tb_product';
    protected $fillable = [
        'id',
        'product_name',
        'description',
        'product_image',
        'created_at',
        'updated_at'
    ];
}
