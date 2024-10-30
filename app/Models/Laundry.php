<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default pluralized version
    protected $table = 'laundry';

    protected $fillable = [
        'customer_name',
        'note_number',
        'barcode',
        'status',
        'price',
        'employee_id',
    ];

    // Relationship with User (Employee)
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    // Relationship with Transaction
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
