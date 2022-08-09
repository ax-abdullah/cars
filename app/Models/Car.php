<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $id = 'id';

    protected $fillable = ['name', 'founded', 'description'];

    public function CarModels(){
        return $this->hasMany(CarModel::class);
    }
    public function headquarter(){
        return $this->hasOne(Headquarter::class);
    }
    public function engines(){
        return $this->hasManyThrough(Engine::class, CarModel::class,
        'car_id',   // Foreign key on CarModels Table
        'model_id'  // Foreign key on Engines Table
    );
    }
}
