<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function getEventdateAttribute()
    // {  
    //     return $this->eventDate->format('d');
    // }
    // protected $appends = ['format_day'];
}
