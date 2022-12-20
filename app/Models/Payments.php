<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'rate_id',
        'provider_id',
        'currency',
        'total_amount',
        'invoice_payload',
        'order_info'
    ];
    
    public function getTotalAmountAttribute($value)
    {
        return ($value/100);
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'userid', 'userid');
    }
    
    public function rate()
    {
        return $this->belongsTo(Rate::class, 'rate_id', 'id');
    }
    
    public function provider()
    {
        return $this->belongsTo(PaymentProvider::class, 'provider_id', 'id');
    }
    
    public function vuachers(){

        return $this->hasMany(Vuacher::class, 'id', 'payment_id');
    }
}
