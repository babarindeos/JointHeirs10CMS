<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'cardno',
        'surname',
        'firstname',
        'middlename',
        'dob',
        'phone',
        'email',        
        'occupation',
        'home_addr',
        'denomination',
        'denomination_addr',
        'nok',
        'nok_phone',
        'nok_addr',
        'bank_id',
        'account_number',
        'account_name',
    ];


    public function Bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id'); 
    }
}
