<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Modeel;
use App\Models\Imageproduct;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function modeels()
    {
        return $this->hasMany(Modeel::class);
    }
    public function imageproducts()
    {
        return $this->hasMany(Imageproduct::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
