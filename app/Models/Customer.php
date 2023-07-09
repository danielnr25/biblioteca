<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'email', 'phone', 'address', 'city'];


    // Concatenamos el nombre y el apellido
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->last_name;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}
