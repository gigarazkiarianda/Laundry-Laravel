<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'note_number',
        'barcode',
        'status',
        'price',
        'employee_id',
    ];

    // Relasi ke User
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    // Relasi ke Transaction
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
