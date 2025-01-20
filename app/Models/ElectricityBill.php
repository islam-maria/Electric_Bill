<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricityBill extends Model
{
    use HasFactory;

    protected $table = 'bills';
    protected $primaryKey = 'bill_id';


    protected $fillable = [
        'customer_id',
        'initial_reading',
        'final_reading',
        'month',
        'year',
        'amount_per_unit',
        'total_amount',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    // Other properties and methods...

    // Define the inverse of the relationship with the custome
}




