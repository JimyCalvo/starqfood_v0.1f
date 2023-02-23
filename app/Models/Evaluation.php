<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Restaurant;

class Evaluation extends Model
{
    use HasFactory;
    protected $table='evaluations';
    protected $fillable = ['user_id_fk', 'ruc_fk', 'score'];
    public function user(){
        return $this->belongsTo(User::class,'user_id_fk','user_id');
    }
    public function restaurant(){
        return $this->belongsTo(Restaurant::class,'ruc_fk','ruc');
    }
}
