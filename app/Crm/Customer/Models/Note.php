<?php

namespace Crm\customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable=[
      'note',
        'customer_id',
    ];
    public function customer(){
        $this->belongsTo(Customer::class);
    }

}
