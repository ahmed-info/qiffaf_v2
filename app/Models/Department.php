<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Department extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
