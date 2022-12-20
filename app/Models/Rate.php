<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['name','button_name','description','price'];
    
    
    public function vuachers(){

        return $this->hasMany(Vuacher::class, 'rate_id', 'id');
    }
    
    public function payments(){

        return $this->hasMany(Payments::class, 'rate_id', 'id');
    }
}
