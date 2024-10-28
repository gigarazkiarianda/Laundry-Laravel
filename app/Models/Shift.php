<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'kasir_id',
        'start_time',
        'end_time',
        'total_income',
    ];

    // Relasi ke User
    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    // Relasi ke Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
