<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Register extends Authenticatable
{
    use Notifiable;

    protected $table = 'registers';

    protected $fillable = ['customer_name','customer_lastname','customer_adres','customer_phone','customer_email', 'customer_password','customer_il', 'customer_ilce'];


    protected $hidden = ['customer_password'];


    public function getAuthPassword()
    {
        return $this->customer_password; // 'password' metodunu overriding
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['customer_password'] = bcrypt($value);  // Hash the password
    }
}
