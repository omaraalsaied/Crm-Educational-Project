<?php

namespace Crm\Project\Models;

use App\crm\customer\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;



    public function customer(){
        $this->belongsTo(Customer::class);
    }


}
