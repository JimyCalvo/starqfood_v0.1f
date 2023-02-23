<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;
    protected $table='restaurant_categories';
    protected $primaryKey = 'category_id';
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'category_id_fk');
    }
}
