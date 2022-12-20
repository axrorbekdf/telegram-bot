<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuacher extends Model
{
    use HasFactory;

    protected $fillable = ['userid','rate_id','payment_id','login','password', 'type','status'];
    
    
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'userid', 'userid');
    }
    
    public function rate()
    {
        return $this->belongsTo(Rate::class, 'rate_id', 'id');
    }
    
    public function payment()
    {
        return $this->belongsTo(Payments::class, 'payment_id', 'id');
    }
}
