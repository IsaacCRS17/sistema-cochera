<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicles extends Model
{
    use HasFactory;
    protected $fillable = ['model', 'placa', 'vehicletype_id','state'];
}
