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
}
