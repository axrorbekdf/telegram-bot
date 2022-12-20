<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProvider extends Model
{
    use HasFactory;

    protected $fillable = ['name','token'];
    
    public function payments(){

        return $this->hasMany(Payments::class, 'id', 'provider_id');
    }
    
}
