<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function leads(){

        return $this->hasMany(Leads::class, 'services_id', 'id');
    }

}

