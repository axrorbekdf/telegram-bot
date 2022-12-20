<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'step',
        'first_name',
        'last_name',
        'username',
        'phone'
    ];
    
    
    public function vuachers(){

        return $this->hasMany(Vuacher::class, 'userid', 'userid');
    }
    
    public function payments(){

        return $this->hasMany(Payments::class, 'userid', 'userid');
    }
}
