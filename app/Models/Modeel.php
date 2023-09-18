<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Modeldetail;
use App\Models\Product;

class Modeel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function modeeldetails()
    {
        return $this->hasMany(Modeeldetail::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
