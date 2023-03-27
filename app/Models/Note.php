<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'date',
        'total',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'note_items', 'note_id', 'item_id')
            ->withPivot('quantity', 'total');
    }
}
