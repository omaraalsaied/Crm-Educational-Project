<?php

namespace App\crm\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable= [
        'name'
    ];

public function invoices(){
        $this->hasMany(Invoice::class);
}

public function notes(){
        $this->hasMany(Note::class);
}

public function projects(){
        $this->hasMany(Project::class);
}

}
