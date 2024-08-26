<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'is_replay',
        'name',
        'email',
        'phone',
        'whatsapp',
        'best_contact_method',
        'message',
    ];
}

