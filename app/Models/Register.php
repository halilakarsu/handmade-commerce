<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Register extends Authenticatable
{
    use Notifiable;

    protected $table = 'registers';

    protected $fillable = ['customer_email', 'customer_password'];


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
