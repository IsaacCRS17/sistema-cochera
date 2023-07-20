<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    use HasFactory;
    protected $fillable = ['name','dni','state'];
    
    public function getVehicles()
    {
        return $this->hasMany(vehicles::class, 'vehicletype_id','id')
        ->where('state','ACTIVE');
    }
}
