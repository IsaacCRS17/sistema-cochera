<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_types extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'state'];

    public function getVehicles()
    {
        return $this->hasMany(vehicles::class, 'vehicletype_id','id')
        ->where('state','ACTIVE');
    }
}
