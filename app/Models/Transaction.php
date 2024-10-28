<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'laundry_id',
        'payment_status',
        'amount',
        'shift_id',
    ];

    // Relasi ke Laundry
    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }

    // Relasi ke Shift
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
