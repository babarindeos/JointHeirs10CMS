<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'month',
        'year',
        'user_id',
        'dev_levy',
        'pension',
        'savings',
        'shares',
        'payment_date',
        'remarks',
        'post_mode',
        'reference_id'
    ];
}
