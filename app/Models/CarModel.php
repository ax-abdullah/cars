<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $table = 'car_models';
    protected $id    = 'id';

    public function Car(){
        return $this->belongsTo(Car::class);
    }
}
