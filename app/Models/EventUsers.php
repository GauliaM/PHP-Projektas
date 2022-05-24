<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUsers extends Model
{
    use HasFactory;

    protected $table = 'eventUsers';
    protected $fillable = ['events_id', 'name', 'email', 'phone'];
}
