<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Customer extends Authenticatable

{
    use Notifiable;

    // Define the table name if it's not the default 'customers'
    protected $table = 'customers';

    // Define the primary key
    protected $primaryKey = 'customer_id';

    // Define fillable fields
    protected $fillable = [
        'customer_id',
        'customer_name',
        'address',
        'phone_no',
        'email',
        'region_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}


