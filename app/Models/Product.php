<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ "name", "price", "content","picture" ];
    public function images()
    {
        return $this->hasMany(image_products::class);
    }

}
