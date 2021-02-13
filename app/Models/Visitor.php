<?php

namespace App\Models;

use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory, EncryptableDbAttribute;

    protected $guarded = [];

    protected $encryptable = [
        'citizen_no',
        'phone_no'
    ];

    protected $casts = [
        'citizen_no' => 'integer',
        'phone_no' => 'integer'
    ];
}
