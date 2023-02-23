<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodCategory;
use App\Models\Restaurant;

class Food extends Model
{
    use HasFactory;
    protected $table ='foods';
    protected $primaryKey='food_id';
    public function category(){
        return $this->belongsTo(FoodCategory::class,'category_id_fk','category_id');
    }
    public function restaurant(){
        return $this->belongsTo(Restaurant::class,'ruc_fk','ruc');
    }
    //----------------------------------------------------------
    public function image()
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
}
