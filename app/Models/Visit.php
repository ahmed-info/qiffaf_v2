<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Modeel;

class Visit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function modeel()
    {
        return $this->belongsTo(Modeel::class);
    }
}
