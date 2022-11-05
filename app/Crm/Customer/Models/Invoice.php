<?php

namespace Crm\customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
        protected $fillable = [
            'status',
            'total',
            'customer_id',
        ];
    public function customer(){
        $this->belongsTo(Customer::class);
    }
}
